<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Form\EditAdministratorsFormType;
use App\Form\NewAdministratorsFormType;
use App\Repository\HourRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(HourRepository $hourRepository): Response
    {
        $hourFixtures = $hourRepository->findOneBy([]);

        return $this->render('admin/index.html.twig', [
            'hourFixtures' => $hourFixtures,
        ]);
    }

    #[Route('/admin/administrators', name: 'administrators')]
    public function findByRole(HourRepository $hourRepository, UserRepository $userRepository): Response
    {
        $hourFixtures = $hourRepository->findOneBy([]);
        $users = $userRepository->findByRole('ROLE_ADMIN');

        return $this->render('admin/administrators.html.twig', [
            'hourFixtures' => $hourFixtures,
            'users' => $users
        ]);
    }


    #[Route('/admin/newadministrators', name: 'newadministrators')]
    public function newAdministrators(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager, HourRepository $hourRepository): Response
    {
        $hourFixtures = $hourRepository->findOneBy([]);

        $users = new User();
        $form = $this->createForm(NewAdministratorsFormType::class, $users);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // encode the plain password
            $users->setPassword(
                $userPasswordHasher->hashPassword(
                    $users,
                    $form->get('password')->getData()
                )
            );

            $users->setRoles(['ROLE_ADMIN']);

            $entityManager->persist($users);
            $entityManager->flush();
            return $this->redirectToRoute('administrators');
        }

        return $this->render('admin/newadministrators.html.twig', [
            'hourFixtures' => $hourFixtures,
            'registrationForm' => $form->createView(),
        ]);
    }

    #[Route('/admin/editadministrators/{id}', name: 'editadministrators', methods: ['GET', 'POST'])]
    public function editAdministrators(HourRepository $hourRepository,Request $request, EntityManagerInterface $entityManager, UserRepository $userRepository, User $user, int $id): Response
    {
        $hourFixtures = $hourRepository->findOneBy([]);

        $users = $userRepository->findOneBy(["id" => $id]);
        $form = $this->createForm(EditAdministratorsFormType::class, $users);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->persist( $users);
            $entityManager->flush();
            return $this->redirectToRoute('administrators');
        }

        return $this->render('admin/editadministrators.html.twig', [

            'hourFixtures' => $hourFixtures,
            'form' => $form->createView()
        ]);
    }

    #[Route('/admin/deleteadministrators/{id}', name: 'deleteadministrators', methods: ['GET'])]
    public function deleteUsers( EntityManagerInterface $entityManager, User $user): Response
    {
        $entityManager->remove($user);
        $entityManager->flush();

        return $this->redirectToRoute("administrators");
    }
}

