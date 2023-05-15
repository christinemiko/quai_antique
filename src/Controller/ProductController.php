<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Repository\HourRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/alacarte', name: 'alacarte')]
    public function index(ProductRepository $repository, HourRepository $hourRepository): Response
    {
        $hourFixtures = $hourRepository->findOneBy([]);
        $productsFixtures = $repository->findBy(['category' => '1']);
        $productsFixtures2 = $repository->findBy(['category' => '2']);
        $productsFixtures3 = $repository->findBy(['category' => '3']);
        $productsFixtures4 = $repository->findBy(['category' => '4']);
        $productsFixtures5 = $repository->findBy(['category' => '5']);
        $productsFixtures6 = $repository->findBy(['category' => '6']);
        $productsFixtures7 = $repository->findBy(['category' => '7']);

        return $this->render('cardmenu.html.twig', [
            'hourFixtures' => $hourFixtures,
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



