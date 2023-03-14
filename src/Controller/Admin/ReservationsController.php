<?php

namespace App\Controller\Admin;

use App\Entity\Menu;
use App\Entity\Reservation;
use App\Form\MenusFormType;
use App\Form\ReservationsFormType;
use App\Repository\HourRepository;
use App\Repository\MenuRepository;
use App\Repository\ReservationRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use phpDocumentor\Reflection\DocBlock\Tags\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationsController extends AbstractController
{
    private ReservationRepository $reservationRepository;

    function __construct(ReservationRepository $reservationRepository)
    {
        $this->reservationRepository = $reservationRepository;
    }

    #[Route('/admin/reservations', name: 'app_admin_reservations')]
    public function showreservation(HourRepository $hourRepository, ReservationRepository $reservationRepository, UserRepository $userRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $hourFixtures = $hourRepository->find(33);
        $reservations = $reservationRepository->findBy([], ['dateReservation' => 'ASC']);

        $reservationsTest = $reservations[0];
        //dump($reservationsTest->getUser());

        $reservations = $paginator->paginate(
            $reservationRepository->findBy([], ['dateReservation' => 'ASC', 'hourReservation' =>'ASC']),
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );

        return $this->render('admin/reservations.html.twig', [
            'hourFixtures' => $hourFixtures,
            'reservations' => $reservations
        ]);
    }

    public function getAvailablePlace($dateReservation, $hourReservation)
    {
        return 46 - $this->reservationRepository->findNumberPerson($dateReservation, $hourReservation);
    }

    #[Route('/admin/newreservations', name: 'app_admin_newreservations', methods: ['GET', 'POST'])]
    public function newReservations(HourRepository $hourRepository, Request $request, EntityManagerInterface $entityManager): Response
    {

        $availablePlace = $this->getAvailablePlace(date('Y-m-d'), '12:00:00');
        $hourFixtures = $hourRepository->find(33);
        $reservations = new Reservation ();

        $form = $this->createForm(ReservationsFormType::class, $reservations);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $reservations = $form->getData();

            $entityManager->persist($reservations);
            $entityManager->flush();
            return $this->redirectToRoute('reservations');
        }

        return $this->render('admin/newreservations.html.twig', [

            'hourFixtures' => $hourFixtures,
            'availablePlace' => $availablePlace,
            'form' => $form->createView()

        ]);
    }

    #[Route('/admin/editreservations/{id}', name: 'app_admin_editreservations', methods: ['GET', 'POST'])]
    public function editReservations(HourRepository $hourRepository, Request $request, EntityManagerInterface $entityManager, ReservationRepository $reservationRepository, int $id): Response
    {
        $hourFixtures = $hourRepository->find(33);

        $reservations = $reservationRepository->findOneBy(["id" => $id]);
        $form = $this->createForm(ReservationsFormType::class, $reservations);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($reservations);
            $entityManager->flush();
            return $this->redirectToRoute('reservations');
        }

        return $this->render('admin/editreservations.html.twig', [

            'hourFixtures' => $hourFixtures,
            'form' => $form->createView()
        ]);
    }

    #[Route('/admin/deletereservations/{id}', name: 'app_admin_deletereservations', methods: ['GET'])]
    public function deleteMenus(Request $request, EntityManagerInterface $entityManager, Reservation $reservations): Response
    {
        $entityManager->remove($reservations);
        $entityManager->flush();

       return $this->redirectToRoute("reservations");
   }


     #[Route('/checkAvailability', name: 'app_checkavailability')]
       public function checkAvailability( Request $request): Response
       {

           $dateReservation = $request->query->get('date');
           $hourReservation = $request->query->get('time');
           //dump($this->getAvailablePlace($dateReservation, $hourReservation));
         return $this->json(['availablePlace' => $this->getAvailablePlace($dateReservation, $hourReservation)]);

       }

}
