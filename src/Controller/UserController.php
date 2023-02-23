<?php

namespace App\Controller;
use App\Entity\User;
use App\Repository\HourRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user', methods: ['GET'])]
    public function index( HourRepository $hourRepository): Response
    {
        $hourFixtures = $hourRepository->find(33);
        return $this->render('homepage.html.twig', [
            'hourFixtures' => $hourFixtures,
        ]);
    }
    #[Route('/moncompte', name: 'app_moncompte')]
    public function myAccount(HourRepository $repository) : Response
    {
        $hourFixtures = $repository->find(33);
        return $this->render('moncompte.html.twig',[
            'hourFixtures' => $hourFixtures
        ]);
    }

    #[Route('confirmdeletemoncompte', name: 'app_confirmdeletemoncompte' )]
    public function confirm ( UserRepository $userRepository,HourRepository $hourRepository) : Response
    {
        $hourFixtures =  $hourRepository->find(33);
        return $this->render('deletemoncompte.html.twig', [
            'hourFixtures' => $hourFixtures
        ]);
    }
    #[Route('deletemoncompte/{id}', name: 'app_deletemoncompte', methods: ['GET'])]
    public function delete( EntityManagerInterface $entityManager, User $user) : Response
    {
        $entityManager->remove($user);
        $entityManager->flush();

        return $this->redirectToRoute("accueil");
    }
}
