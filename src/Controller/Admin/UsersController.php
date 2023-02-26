<?php

namespace App\Controller\Admin;

use App\Repository\HourRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsersController extends AbstractController
{

    #[Route('/admin/users', name: 'app_admin_users')]
    public function showusers (HourRepository $hourRepository, UserRepository $userRepository): Response
    {
        $hourFixtures = $hourRepository->find(33);
        $users = $userRepository->findAll();

        return $this->render('admin/users.html.twig', [

            'hourFixtures' => $hourFixtures,
            'users' => $users,
        ]);
    }
}

