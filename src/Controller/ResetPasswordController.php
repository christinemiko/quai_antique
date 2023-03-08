<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ResetPasswordRequestFormType;
use App\Repository\HourRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResetPasswordController extends AbstractController
{
    #[Route('/app_forgot_password_request', name: 'app_forgot_password_request')]
    public function forgetPwdRequest(Request $request, HourRepository $hourRepository): Response
    {
        $hourFixtures = $hourRepository->find(33);
        $user = new User();
        $form = $this->createForm(ResetPasswordRequestFormType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid() ){

        }

        return $this->render("reset_password/request.html.twig",[
            'hourFixtures' => $hourFixtures,
            'requestForm' => $form->createView()
        ] );
    }
}
