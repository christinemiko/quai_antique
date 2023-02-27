<?php

namespace App\Controller\Admin;

use App\Repository\HourRepository;
use App\Repository\ReservationRepository;
use App\Repository\UserRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationsController extends AbstractController
{

    #[Route('/admin/reservations', name: 'app_admin_reservations')]
    public function showreservation(HourRepository $hourRepository, ReservationRepository $reservationRepository, UserRepository $userRepository,PaginatorInterface $paginator, Request $request): Response
    {
        $hourFixtures = $hourRepository->find(33);
        $reservations = $reservationRepository->findAll();

        $reservationsTest =  $reservations[0];
        dump( $reservationsTest->getUser());

        $reservations = $paginator->paginate(
            $reservationRepository->findAll(),
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );

        return $this->render('admin/reservations.html.twig', [
            'hourFixtures' => $hourFixtures,
            'reservations' => $reservations
        ]);
    }
}

