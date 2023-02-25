<?php

namespace App\Controller;

use App\Repository\HourRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
}
