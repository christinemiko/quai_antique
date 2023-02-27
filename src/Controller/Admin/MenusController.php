<?php

namespace App\Controller\Admin;

use App\Repository\HourRepository;
use App\Repository\MenuRepository;
use App\Repository\ProductMenuRepository;
use App\Repository\UserRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenusController extends AbstractController
{

    #[Route('/admin/menus', name: 'app_admin_menus')]
    public function getProductMenus(ProductMenuRepository $repository, MenuRepository $menuRepository, HourRepository $hourRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $hourFixtures = $hourRepository->find(33);

        $menu = $menuRepository->find(62);
        dump($menu->getProductMenus());

        $productMenus = $repository->findAll();


        $productMenuTest = $productMenus[0];
        dump($productMenuTest->getProduct()->getCategory()->getNameCategory());

        $productMenus = $paginator->paginate(
            $repository->findAll(),
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );

        return $this->render('admin/menus.html.twig', [
            'productMenus' => $productMenus,
            'menu' => $menu,
            'hourFixtures' => $hourFixtures,
        ]);
    }

    #[Route('/admin/createmenus', name: 'app_admin_createmenus')]
    public function index (HourRepository $hourRepository, MenuRepository $menuRepository): Response
    {
        $hourFixtures = $hourRepository->find(33);
        $menus = $menuRepository->findAll();

        return $this->render('admin/createmenus.html.twig', [

            'hourFixtures' => $hourFixtures,
            'menus' => $menus,
        ]);
    }

}

