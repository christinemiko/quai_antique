<?php

namespace App\Controller\Admin;

use App\Repository\HourRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationsController extends AbstractController
{

    #[Route('/admin/reservations', name: 'app_admin_reservations')]
    public function showreservations (HourRepository $hourRepository): Response
    {
        $hourFixtures = $hourRepository->find(33);

        return $this->render('admin/reservations.html.twig', [
            'hourFixtures' => $hourFixtures,
        ]);
    }
}

