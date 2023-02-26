<?php

namespace App\Controller\Admin;

use App\Repository\HourRepository;
use App\Repository\ReservationRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationsController extends AbstractController
{

    #[Route('/admin/reservations', name: 'app_admin_reservations')]
    public function showreservation(HourRepository $hourRepository, ReservationRepository $reservationRepository, UserRepository $userRepository): Response
    {
        $hourFixtures = $hourRepository->find(33);
        $reservations = $reservationRepository->findAll();


        $reservationsTest =  $reservations[0];
        dump( $reservationsTest->getUser());


        return $this->render('admin/reservations.html.twig', [
            'hourFixtures' => $hourFixtures,
            'reservations' => $reservations
        ]);
    }
}

