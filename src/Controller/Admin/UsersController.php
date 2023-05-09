<?php

namespace App\Controller\Admin;


use App\Entity\User;
use App\Form\EditUserFormType;
use App\Form\NewUserFormType;
use App\Repository\HourRepository;
use App\Repository\UserRepository;
use App\Security\AppLoginAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class UsersController extends AbstractController
{

    #[Route('/admin/users', name: 'users')]
    public function showusers (HourRepository $hourRepository, UserRepository $userRepository,PaginatorInterface $paginator, Request $request): Response
    {
        $hourFixtures = $hourRepository->find(33);


        $users = $paginator->paginate(
            $userRepository->findBy([],['lastName' => 'ASC']),
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );

        return $this->render('admin/users.html.twig', [

            'hourFixtures' => $hourFixtures,
            'users' => $users,
        ]);
    }

    #[Route('/admin/newusers', name: 'newusers')]
    public function newUsers(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager, HourRepository $hourRepository): Response
    {
        $hourFixtures = $hourRepository->find(33);
        $users = new User();
        $form = $this->createForm(NewUserFormType::class, $users);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // encode the plain password
            $users->setPassword(
                $userPasswordHasher->hashPassword(
                    $users,
                    $form->get('plainPassword')->getData()
                )
            );

            $users->setRoles(['ROLE_CLIENT']);

            $entityManager->persist($users);
            $entityManager->flush();
            return $this->redirectToRoute('users');
        }

        return $this->render('admin/newusers.html.twig', [
            'hourFixtures' => $hourFixtures,
            'registrationForm' => $form->createView(),
        ]);
    }

   #[Route('/admin/editusers/{id}', name: 'editusers', methods: ['GET', 'POST'])]
   public function editUsers(HourRepository $hourRepository,Request $request, EntityManagerInterface $entityManager, UserRepository $userRepository, User $user, int $id): Response
   {
        $hourFixtures = $hourRepository->find(33);

    $users = $userRepository->findOneBy(["id" => $id]);
        $form = $this->createForm(EditUserFormType::class, $users);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->persist( $users);
            $entityManager->flush();
            return $this->redirectToRoute('users');
        }

        return $this->render('admin/editusers.html.twig', [

       'hourFixtures' => $hourFixtures,
        'form' => $form->createView()
        ]);
    }

    #[Route('/admin/deleteusers/{id}', name: 'deleteusers', methods: ['GET'])]
    public function deleteUsers( EntityManagerInterface $entityManager, User $user): Response
    {
        $entityManager->remove($user);
        $entityManager->flush();

        return $this->redirectToRoute("users");
    }




}



