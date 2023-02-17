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
    #[Route('/menudéjeuner', name: 'app_lunch_menu')]
    public function getProductMenus(ProductMenuRepository $repository, MenuRepository $menuRepository): Response
    {
        $menu = $menuRepository->find(62);
        dump($menu->getProductMenus());

        $productMenus = $repository->findBy(['menu'=> '62', 'category' => '238']);
        $productMenus1 = $repository->findBy(['menu'=> '62', 'category' => '239']);
        $productMenus2 = $repository->findBy(['menu'=> '62', 'category' => '242']);

        $productMenuTest = $productMenus[0];
        dump($productMenuTest->getProduct()->getCategory()->getNameCategory());

        return $this->render('lunchmenu.html.twig', [
            'productMenus' => $productMenus,
            'productMenus1' => $productMenus1,
            'productMenus2' => $productMenus2,
            'menu' => $menu
        ]);
    }

}
