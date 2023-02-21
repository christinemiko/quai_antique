<?php

namespace App\Controller;

use App\Repository\HourRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index( HourRepository $hourRepository): Response
    {
        $hourFixtures = $hourRepository->find(33);
        return $this->render('homepage.html.twig', [
            'hourFixtures' => $hourFixtures,
        ]);
    }
    #[Route('/moncompte', name: 'app_moncompte')]
    public function MyAccount(HourRepository $repository) : Response
    {
        $hourFixtures = $repository->find(33);
        return $this->render('moncompte.html.twig',[
            'hourFixtures' => $hourFixtures
        ]);
    }


    #[Route('deletemoncompte', name: 'app_deletemoncompte' )]
    public function remove(UserRepository $userRepository,HourRepository $hourRepository) : Response
    {
        $hourFixtures =  $hourRepository->find(33);
        return $this->render('deletemoncompte.html.twig', [
            'hourFixtures' => $hourFixtures
        ]);
    }
}
