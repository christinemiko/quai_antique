<?php

namespace App\Controller\Admin;


use App\Entity\Product;
use App\Form\ProductFormType;
use App\Repository\CategoryRepository;
use App\Repository\HourRepository;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductsController extends AbstractController
{

    #[Route('/admin/products', name: 'app_admin_products')]
    public function getProducts (ProductRepository $productRepository,HourRepository $hourRepository, CategoryRepository $categoryRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $hourFixtures = $hourRepository->find(33);

        $productsFixtures = $productRepository->findBy([],['category' => 'ASC']);

        $productsFixturesTest =  $productsFixtures[0];
        dump( $productsFixturesTest->getCategory()->getNameCategory());

        $productsFixtures = $paginator->paginate(
            $productRepository->findBy([],['category' => 'ASC']),
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );

        return $this->render('admin/products.html.twig', [
            'hourFixtures' => $hourFixtures,
            'productsFixtures' => $productsFixtures,
        ]);
    }

    #[Route('/admin/newproducts', name: 'app_admin_newproducts', methods: ['GET', 'POST'])]
    public function new(HourRepository $hourRepository,Request $request, EntityManagerInterface $entityManager, PaginatorInterface $paginator) : Response

    {
        $hourFixtures = $hourRepository->find(33);
        $product = new product ();
        $form = $this->createForm(ProductFormType::class, $product);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $product = $form->getData();
            $entityManager->persist($product);
            $entityManager->flush();
            return $this->redirectToRoute('products');
        }


        return $this->render('admin/newproducts.html.twig', [

            'hourFixtures' => $hourFixtures,
            'form' => $form->createView()

        ]);
    }
    #[Route('/admin/editproducts/{id}', name: 'app_admin_editproducts', methods: ['GET', 'POST'])]
    public function edit(HourRepository $hourRepository,Request $request, EntityManagerInterface $entityManager, ProductRepository $productRepository, int $id): response
    {
        $hourFixtures = $hourRepository->find(33);

        $product = $productRepository->findOneBy(["id" => $id]);
        $form = $this->createForm(ProductFormType::class, $product);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
        $entityManager->persist($product);
        $entityManager->flush();
        return $this->redirectToRoute('products');
    }

        return $this->render('admin/editproducts.html.twig', [

            'hourFixtures' => $hourFixtures,
            'form' => $form->createView()

        ]);
    }
     #[Route('/admin/deleteproducts/{id}', name: 'app_admin_deleteproducts', methods: ['GET'])]
     public function delete( EntityManagerInterface $entityManager, Product $product): Response
     {
         $entityManager->remove($product);
         $entityManager->flush();

         return $this->redirectToRoute("products");
     }

}

