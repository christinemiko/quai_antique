<?php

namespace App\Controller;

use App\Repository\MenuRepository;
use App\Repository\HourRepository;
use App\Repository\ProductMenuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LunchMenuController extends AbstractController
{
    #[Route('/menudéjeuner', name: 'menudéjeuner')]
    public function getProductMenus(ProductMenuRepository $repository, MenuRepository $menuRepository, HourRepository $hourRepository): Response
    {
        $hourFixtures = $hourRepository->findOneBy([]);
        $menu = $menuRepository->findOneBy(['nameMenu' => 'Menu Déjeuner_Aurore']);
        //dump($menu->getProductMenus());

        $productMenus = $repository->findBy(['menu'=> '1', 'category' => '1']);
        $productMenus1 = $repository->findBy(['menu'=> '1', 'category' => '2']);
        $productMenus2 = $repository->findBy(['menu'=> '1', 'category' => '5']);

        $productMenuTest = $productMenus[0];
        //dump($productMenuTest->getProduct()->getCategory()->getNameCategory());

        return $this->render('lunchmenu.html.twig', [
            'productMenus' => $productMenus,
            'productMenus1' => $productMenus1,
            'productMenus2' => $productMenus2,
            'menu' => $menu,
            'hourFixtures' => $hourFixtures,
        ]);
    }

}
