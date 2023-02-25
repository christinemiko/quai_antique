<?php

namespace App\Controller\Admin;

use App\Repository\HourRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenusController extends AbstractController
{

    #[Route('/admin/menus', name: 'app_admin_menus')]
    public function showhours (HourRepository $hourRepository): Response
    {
        $hourFixtures = $hourRepository->find(33);

        return $this->render('admin/menus.html.twig', [
            'hourFixtures' => $hourFixtures,
        ]);
    }
}

