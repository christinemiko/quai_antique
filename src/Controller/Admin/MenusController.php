<?php

namespace App\Controller\Admin;

use App\Entity\ProductMenu;
use App\Entity\Product;
use App\Form\ProductFormType;
use App\Form\ProductMenusFormType;
use App\Repository\HourRepository;
use App\Repository\MenuRepository;
use App\Repository\ProductMenuRepository;
use App\Repository\ProductRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
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
    #[Route('/admin/newproductmenus', name: 'app_admin_newproductmenus', methods: ['GET', 'POST'])]
    public function new(HourRepository $hourRepository,Request $request, EntityManagerInterface $entityManager, ProductMenuRepository $productMenuRepository) : Response

    {
        $hourFixtures = $hourRepository->find(33);
        $productMenus = new productMenu ();

        $form = $this->createForm(ProductMenusFormType::class, $productMenus);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $productMenus = $form->getData();
            $entityManager->persist($productMenus);
            $entityManager->flush();
            return $this->redirectToRoute('menus');
        }


        return $this->render('admin/newproductmenus.html.twig', [

            'hourFixtures' => $hourFixtures,
            'form' => $form->createView()

        ]);
    }

    #[Route('/admin/editproductmenus/{id}', name: 'app_admin_editproductmenus', methods: ['GET', 'POST'])]
    public function editProductMenus(HourRepository $hourRepository,Request $request, EntityManagerInterface $entityManager,MenuRepository $menuRepository,ProductMenuRepository $repository, int $id): response
    {
        $hourFixtures = $hourRepository->find(33);

        $menu = $menuRepository->find(62);
        dump($menu->getProductMenus());

        $productMenus = $repository->findOneBy(["id" => $id]);
        $form = $this->createForm(ProductMenusFormType::class, $productMenus);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($productMenus);
            $entityManager->flush();
            return $this->redirectToRoute('menus');
        }

        return $this->render('admin/editproductmenus.html.twig', [

            'hourFixtures' => $hourFixtures,
            'form' => $form->createView()

        ]);
    }
    #[Route('/admin/deleteproductmenus/{id}', name: 'app_admin_deleteproductmenus', methods: ['GET'])]
    public function delete( EntityManagerInterface $entityManager, ProductMenu $productMenus): Response
    {
        $entityManager->remove($productMenus);
        $entityManager->flush();

        return $this->redirectToRoute("menus");
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

