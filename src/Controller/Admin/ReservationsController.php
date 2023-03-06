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
use Doctrine\ORM\EntityManagerInterface;
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
        $reservations = $reservationRepository->findBy([],['dateReservation' => 'ASC']);

        $reservationsTest =  $reservations[0];
        dump( $reservationsTest->getUser());

        $reservations = $paginator->paginate(
            $reservationRepository->findBy([],['dateReservation' => 'ASC']),
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );

        return $this->render('admin/reservations.html.twig', [
            'hourFixtures' => $hourFixtures,
            'reservations' => $reservations
        ]);
    }


    #[Route('/admin/newreservations', name: 'app_admin_newreservations', methods: ['GET', 'POST'])]
    public function newReservations(HourRepository $hourRepository,Request $request, EntityManagerInterface $entityManager, ReservationRepository $reservationRepository):Response
    {
        $hourFixtures = $hourRepository->find(33);
        $reservations = new Reservation ();

        $form = $this->createForm(ReservationsFormType::class, $reservations);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $reservations = $form->getData();
            $entityManager->persist($reservations);
            $entityManager->flush();
            return $this->redirectToRoute('reservations');
        }

        return $this->render('admin/newreservations.html.twig', [

            'hourFixtures' => $hourFixtures,
            'form' => $form->createView()

        ]);
    }

    #[Route('/admin/editreservations/{id}', name: 'app_admin_editreservations', methods: ['GET', 'POST'])]
    public function editReservations(HourRepository $hourRepository,Request $request, EntityManagerInterface $entityManager,ReservationRepository $reservationRepository,int $id): Response
    {
        $hourFixtures = $hourRepository->find(33);

        $reservations = $reservationRepository->findOneBy(["id" => $id]);
        $form = $this->createForm(ReservationsFormType::class,$reservations);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
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
   public function deleteMenus( EntityManagerInterface $entityManager, Reservation $reservations): Response
   {
       $entityManager->remove($reservations);
       $entityManager->flush();

       return $this->redirectToRoute("reservations");
   }
}

