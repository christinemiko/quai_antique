<?php

namespace App\Controller\Admin;

use App\Repository\HourRepository;
use App\Repository\UserRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
}

