<?php

namespace App\Controller\Admin;

use App\Repository\HourRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PicturesController extends AbstractController
{

    #[Route('/admin/pictures', name: 'app_admin_pictures')]
    public function showpictures (HourRepository $hourRepository): Response
    {
        $hourFixtures = $hourRepository->find(33);

        return $this->render('admin/pictures.html.twig', [
            'hourFixtures' => $hourFixtures,
        ]);
    }
}

