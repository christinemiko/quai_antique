<?php

namespace App\Controller;

use App\Repository\MenuRepository;
use App\Repository\HourRepository;
use App\Repository\ProductMenuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DinnerMenuController extends AbstractController
{
    #[Route('/menudiner', name: 'menudiner')]
    public function getProductMenus(ProductMenuRepository $repository, MenuRepository $menuRepository, HourRepository $hourRepository): Response
    {
        $hourFixtures = $hourRepository->findOneBy([]);

        $menu = $menuRepository->findOneBy(['nameMenu' => 'Menu Dîner_Crepuscule']);
        //dump($menu->getProductMenus());

        $productMenus = $repository->findBy(['menu'=> '2', 'category' => '1']);
        $productMenus1 = $repository->findBy(['menu'=> '2', 'category' => '2']);
        $productMenus2 = $repository->findBy(['menu'=> '2', 'category' => '5']);


        $productMenuTest = $productMenus[0];
        //dump($productMenuTest->getProduct()->getCategory()->getNameCategory());

        return $this->render('dinnermenu.html.twig', [
            'productMenus' => $productMenus,
            'productMenus1' => $productMenus1,
            'productMenus2' => $productMenus2,
            'menu' => $menu,
            'hourFixtures' => $hourFixtures,
        ]);
    }
}
