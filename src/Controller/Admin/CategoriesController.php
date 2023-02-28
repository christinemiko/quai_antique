<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Hour;
use App\Form\CategoriesFormType;
use App\Form\HoursFormType;
use App\Repository\CategoryRepository;
use App\Repository\HourRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoriesController extends AbstractController
{

    #[Route('/admin/categories', name: 'app_admin_categories')]
    public function index (HourRepository $hourRepository, CategoryRepository $categoryRepository,PaginatorInterface $paginator, Request $request): Response
    {
        $hourFixtures = $hourRepository->find(33);

        $categorys = $paginator->paginate(
            $categoryRepository->findAll(),
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );

        return $this->render('admin/categories.html.twig', [
            'hourFixtures' => $hourFixtures,
            'categorys' => $categorys,
        ]);
    }

    #[Route('/admin/newcategories', name: 'app_admin_newcategories', methods: ['GET', 'POST'])]
    public function newCategories(HourRepository $hourRepository,Request $request, EntityManagerInterface $entityManager, CategoryRepository $categoryRepository): Response
    {
        $hourFixtures = $hourRepository->find(33);

        $categories = new Category ();

        $form = $this->createForm(CategoriesFormType::class, $categories);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $categories = $form->getData();
            $entityManager->persist($categories);
            $entityManager->flush();

            return $this->redirectToRoute('categories');
        }

        return $this->render('admin/newcategories.html.twig', [

            'hourFixtures' => $hourFixtures,
            'form' => $form->createView()

        ]);
    }



}

