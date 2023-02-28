<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Form\NewUserFormType;
use App\Form\RegistrationFormType;
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

    #[Route('/admin/users', name: 'app_admin_users')]
    public function showusers (HourRepository $hourRepository, UserRepository $userRepository,PaginatorInterface $paginator, Request $request): Response
    {
        $hourFixtures = $hourRepository->find(33);


        $users = $paginator->paginate(
            $userRepository->findAll(),
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );

        return $this->render('admin/users.html.twig', [

            'hourFixtures' => $hourFixtures,
            'users' => $users,
        ]);
    }

    #[Route('/admin/newusers', name: 'app_admin_newusers')]
    public function newUsers(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, AppLoginAuthenticator $authenticator, EntityManagerInterface $entityManager, HourRepository $hourRepository): Response
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


}



