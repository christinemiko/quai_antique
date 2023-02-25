<?php

namespace App\Controller\Admin;

use App\Repository\HourRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoriesController extends AbstractController
{

    #[Route('/admin/categories', name: 'app_admin_categories')]
    public function showcategories (HourRepository $hourRepository): Response
    {
        $hourFixtures = $hourRepository->find(33);

        return $this->render('admin/categories.html.twig', [
            'hourFixtures' => $hourFixtures,
        ]);
    }

}

