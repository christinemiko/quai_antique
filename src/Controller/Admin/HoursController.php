<?php

namespace App\Controller\Admin;

use App\Repository\HourRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HoursController extends AbstractController
{

    #[Route('/admin/hours', name: 'app_admin_hours')]
    public function showhours (HourRepository $hourRepository): Response
    {
        $hourFixtures = $hourRepository->find(33);
        $hours = $hourRepository->findAll();

        return $this->render('admin/hours.html.twig', [
            'hourFixtures' => $hourFixtures,
            'hours' => $hours
        ]);
    }
}

