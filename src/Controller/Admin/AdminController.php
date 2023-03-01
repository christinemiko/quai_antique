<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Form\NewAdministratorsFormType;
use App\Form\NewUserFormType;
use App\Repository\HourRepository;
use App\Repository\UserRepository;
use App\Security\AppLoginAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(HourRepository $hourRepository): Response
    {
        $hourFixtures = $hourRepository->find(33);

        return $this->render('admin/index.html.twig', [
            'hourFixtures' => $hourFixtures,
        ]);
    }

    #[Route('/admin/administrators', name: 'app_admin_administrators')]
    public function findByRole(HourRepository $hourRepository, UserRepository $userRepository): Response
    {
        $hourFixtures = $hourRepository->find(33);
        $users = $userRepository->findByRole('ROLE_ADMIN');

        return $this->render('admin/administrators.html.twig', [
            'hourFixtures' => $hourFixtures,
            'users' => $users
        ]);
    }


    #[Route('/admin/newadministrators', name: 'app_admin_newadministrators')]
    public function newAdministrators(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager, HourRepository $hourRepository): Response
    {
        $hourFixtures = $hourRepository->find(33);

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
}

