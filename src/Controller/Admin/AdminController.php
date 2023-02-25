<?php

namespace App\Controller\Admin;

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

    #[Route('cardproducts', name: 'app_cardproducts')]
    public function showcardproducts (HourRepository $hourRepository): Response
    {
        $hourFixtures = $hourRepository->find(33);

        return $this->render('admin/cardproducts.html.twig', [
            'hourFixtures' => $hourFixtures,
        ]);
    }

    #[Route('menus', name: 'app_menus')]
    public function showmenus (HourRepository $hourRepository): Response
    {
        $hourFixtures = $hourRepository->find(33);

        return $this->render('admin/menus.html.twig', [
            'hourFixtures' => $hourFixtures,
        ]);
    }

    #[Route('reservations', name: 'app_reservations')]
    public function showreservations (HourRepository $hourRepository): Response
    {
        $hourFixtures = $hourRepository->find(33);

        return $this->render('admin/reservations.html.twig', [
            'hourFixtures' => $hourFixtures,
        ]);
    }

    #[Route('clients', name: 'app_clients')]
    public function showclients (HourRepository $hourRepository): Response
    {
        $hourFixtures = $hourRepository->find(33);

        return $this->render('admin/clients.html.twig', [
            'hourFixtures' => $hourFixtures,
        ]);
    }

    #[Route('pictures', name: 'app_pictures')]
    public function showpictures (HourRepository $hourRepository): Response
    {
        $hourFixtures = $hourRepository->find(33);

        return $this->render('admin/pictures.html.twig', [
            'hourFixtures' => $hourFixtures,
        ]);
    }

    #[Route('admins', name: 'app_admins')]
    public function showadmins (HourRepository $hourRepository): Response
    {
        $hourFixtures = $hourRepository->find(33);

        return $this->render('admin/admins.html.twig', [
            'hourFixtures' => $hourFixtures,
        ]);
    }

    #[Route('categories', name: 'app_categories')]
    public function showcategories (HourRepository $hourRepository): Response
    {
        $hourFixtures = $hourRepository->find(33);

        return $this->render('admin/categories.html.twig', [
            'hourFixtures' => $hourFixtures,
        ]);
    }

    #[Route('hours', name: 'app_hours')]
    public function showhours (HourRepository $hourRepository): Response
    {
        $hourFixtures = $hourRepository->find(33);

        return $this->render('admin/hours.html.twig', [
            'hourFixtures' => $hourFixtures,
        ]);
    }

}

