<?php

namespace App\Controller\Admin;

use App\Repository\CategoryRepository;
use App\Repository\HourRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoriesController extends AbstractController
{

    #[Route('/admin/categories', name: 'app_admin_categories')]
    public function showcategories (HourRepository $hourRepository, CategoryRepository $categoryRepository,PaginatorInterface $paginator, Request $request): Response
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

}

