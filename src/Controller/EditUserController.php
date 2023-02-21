<?php

namespace App\Controller;

use App\Repository\HourRepository;
use App\Repository\UserRepository;
use App\Entity\User;
use App\Form\EditUserFormType;
use App\Security\AppLoginAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class EditUserController extends AbstractController
{
    #[Route('/edituser', name: 'app_edituser')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, AppLoginAuthenticator $authenticator, EntityManagerInterface $entityManager, HourRepository $hourRepository, UserRepository $userRepository): Response
    {
        $hourFixtures = $hourRepository->find(33);
        $user = new User();
        $form = $this->createForm(EditUserFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $user->setRoles(['ROLE_CLIENT']);

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
