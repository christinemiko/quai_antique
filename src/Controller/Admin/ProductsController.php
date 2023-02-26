<?php

namespace App\Controller\Admin;


use App\Repository\CategoryRepository;
use App\Repository\HourRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductsController extends AbstractController
{

    #[Route('/admin/products', name: 'app_admin_products')]
    public function getProducts (ProductRepository $productRepository,HourRepository $hourRepository, CategoryRepository $categoryRepository): Response
    {
        $hourFixtures = $hourRepository->find(33);

        $productsFixtures = $productRepository->findAll();

        $productsFixturesTest =  $productsFixtures[0];
        dump( $productsFixturesTest->getCategory()->getNameCategory());


        return $this->render('admin/products.html.twig', [
            'hourFixtures' => $hourFixtures,
            'productsFixtures' => $productsFixtures,
        ]);
    }
}

