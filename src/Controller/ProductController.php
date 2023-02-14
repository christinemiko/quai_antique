<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/alacarte', name: 'app_product')]
    public function index(ProductRepository $repository): Response
    {
        $product = $repository->findBy(['id' =>'2,3,4,5,6'], );


        return $this->render('cardmenu.html.twig', [
            'product' => $product
        ]);
    }
}
