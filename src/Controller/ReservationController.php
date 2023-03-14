<?php

namespace App\Controller;
use App\Entity\User;
use App\Entity\Reservation;
use App\Form\ReservationFormType;
use App\Repository\HourRepository;
use App\Repository\ReservationRepository;
use App\Security\AppLoginAuthenticator;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use App\Validator\AvailablePlaces;
use Symfony\Component\Validator\Validator\ValidatorInterface;



class ReservationController extends AbstractController
{
    private ReservationRepository $reservationRepository;

    function __construct(ReservationRepository $reservationRepository)
    {
        $this->reservationRepository = $reservationRepository;
    }

    public function getAvailablePlace($dateReservation, $hourReservation)
    {
        return 46 - $this->reservationRepository->findNumberPerson($dateReservation, $hourReservation);
    }

    #[Route('/reservation', name: 'app_reservation', methods: ['GET', 'POST'])]
    public function index(Request $request,EntityManagerInterface $entityManager,AppLoginAuthenticator $authenticator, HourRepository $repository): Response
    {
        $availablePlace = $this->getAvailablePlace(date('Y-m-d'), '12:00:00');

        $hourFixtures = $repository->find(33);
        $reservation = new Reservation();

        $user = $this->getUser();
        $allergie = $user->getAllergie();
        if (!$user){
           return $this->redirectToRoute('askreservation');
        }
        $reservation->setMessage($user->getAllergie());
        $reservation->setUser($this->getUser());

        $form = $this->createForm(ReservationFormType::class, $reservation);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $reservation = $form->getData();
            $entityManager->persist($reservation);
            $entityManager->flush();
        }

        return $this->render('reservation/reservation.html.twig', [
            'hourFixtures' => $hourFixtures,
            'availablePlace' => $availablePlace,
            'reservationForm' => $form->createView(),
        ]);
    }

    #[Route('/check-availibility', name: 'check_availibility')]
    public function checkAvailabity(Request $request): Response
    {
        return $this->json(["available" => true]);
    }




}
