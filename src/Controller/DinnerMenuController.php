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
    #[Route('/menudiner', name: 'app_dinner_menu')]
    public function getProductMenus(ProductMenuRepository $repository, MenuRepository $menuRepository): Response
    {
        $menu = $menuRepository->find(63);
        dump($menu->getProductMenus());

        $productMenus = $repository->findBy(['menu'=> '63', 'category' => '238']);
        $productMenus1 = $repository->findBy(['menu'=> '63', 'category' => '239']);
        $productMenus2 = $repository->findBy(['menu'=> '63', 'category' => '242']);


        $productMenuTest = $productMenus[0];
        dump($productMenuTest->getProduct()->getCategory()->getNameCategory());

        return $this->render('dinnermenu.html.twig', [
            'productMenus' => $productMenus,
            'productMenus1' => $productMenus1,
            'productMenus2' => $productMenus2,
            'menu' => $menu
        ]);
    }
}
