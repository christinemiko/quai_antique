<?php

namespace App\Controller;

use App\Repository\HourRepository;
use App\Repository\UserRepository;
use App\Form\EditUserFormType;
use App\Security\AppLoginAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;


class EditUserController extends AbstractController
{
    #[Route('/edituser', name: 'edituser')]
    public function register(Request $request, UserAuthenticatorInterface $userAuthenticator, AppLoginAuthenticator $authenticator, EntityManagerInterface $entityManager, HourRepository $hourRepository, UserRepository $userRepository): Response
     {
        $hourFixtures = $hourRepository->find(33);

        $user = $this->getUser();

        $form = $this->createForm(EditUserFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

           $entityManager->persist($user);
           $entityManager->flush();
            // do anything else you need here, like send an email

            return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );
        }

        return $this->render('registration/edituser.html.twig', [
            'hourFixtures' => $hourFixtures,
            'edituserForm' => $form->createView(),
        ]);
    }
}
