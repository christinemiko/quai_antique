<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AvailabilityController extends AbstractController
{
    #[Route('/availability", name="availability')]
    public function checkAvailability(Request $request): JsonResponse
    {
        $dateReservation = $request->query->get('dateReservation');
        $hourReservation = $request->query->get('hourReservation');

        // Utilisez la date et l'heure pour récupérer les informations sur la disponibilité des places dans votre base de données ou ailleurs.

        $availablePlaces = 46; // Remplacez cette valeur par le nombre de places disponibles pour cette date et cette heure.

        return new JsonResponse(['availablePlaces' => $availablePlaces]);
    }






}