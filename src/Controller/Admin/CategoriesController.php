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

    #[Route('/admin/categories', name: 'categories')]
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

    #[Route('/admin/newcategories', name: 'newcategories', methods: ['GET', 'POST'])]
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

    #[Route('/admin/editcategories/{id}', name: 'editcategories', methods: ['GET', 'POST'])]
    public function editCategories(HourRepository $hourRepository,Request $request, EntityManagerInterface $entityManager,CategoryRepository $categoryRepository, int $id): Response
    {
        $hourFixtures = $hourRepository->find(33);

        $categories = $categoryRepository->findOneBy(["id" => $id]);
        $form = $this->createForm(CategoriesFormType::class, $categories);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($categories);
            $entityManager->flush();
            return $this->redirectToRoute('categories');
        }

        return $this->render('admin/editcategories.html.twig', [

            'hourFixtures' => $hourFixtures,
            'form' => $form->createView()
        ]);

    }

    #[Route('/admin/deletecategories/{id}', name: 'deletecategories', methods: ['GET'])]
    public function deleteCategories( EntityManagerInterface $entityManager, Category $category): Response
    {
        $entityManager->remove($category);
        $entityManager->flush();

        return $this->redirectToRoute("categories");
    }


}

