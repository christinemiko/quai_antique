<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Repository\HourRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/alacarte', name: 'app_product')]
    public function index(ProductRepository $repository): Response
    {

        $productsFixtures = $repository->findBy(['category' => '238']);
        $productsFixtures2 = $repository->findBy(['category' => '239']);
        $productsFixtures3 = $repository->findBy(['category' => '240']);
        $productsFixtures4 = $repository->findBy(['category' => '241']);
        $productsFixtures5 = $repository->findBy(['category' => '242']);
        $productsFixtures6 = $repository->findBy(['category' => '243']);
        $productsFixtures7 = $repository->findBy(['category' => '244']);

        return $this->render('cardmenu.html.twig', [
            'productsFixtures' => $productsFixtures,
            'productsFixtures2' => $productsFixtures2,
            'productsFixtures3' => $productsFixtures3,
            'productsFixtures4' => $productsFixtures4,
            'productsFixtures5' => $productsFixtures5,
            'productsFixtures6' => $productsFixtures6,
            'productsFixtures7' => $productsFixtures7,
        ]);

    }


}



