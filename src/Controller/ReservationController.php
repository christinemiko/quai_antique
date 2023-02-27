<?php

namespace App\Controller;
use App\Entity\User;
use App\Entity\Reservation;
use App\Form\ReservationFormType;
use App\Repository\HourRepository;
use App\Security\AppLoginAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class ReservationController extends AbstractController
{
    #[Route('/reservation', name: 'app_reservation')]
    public function index(Request $request,EntityManagerInterface $entityManager,AppLoginAuthenticator $authenticator, HourRepository $repository): Response
    {
        $hourFixtures = $repository->find(33);

        $reservation = new Reservation();

        $user = $this->getUser();
        if (!$user){
           return $this->redirectToRoute('askreservation');
        }

        $reservation->setUser($this->getUser());


        $form = $this->createForm(ReservationFormType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $reservation = $form->getData();
            dump($reservation);
            $entityManager->persist($reservation);
            //$entityManager->flush();
        }

        return $this->render('reservation/reservation.html.twig', [
            'hourFixtures' => $hourFixtures,
            'reservationForm' => $form->createView(),
        ]);
    }

    #[Route('/check-availibility', name: 'check_availibility')]
    public function checkAvailabity(Request $request): Response
    {
        return $this->json(["available" => true]);
    }
}
