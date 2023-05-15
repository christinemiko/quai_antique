<?php

namespace App\Controller\Admin;

use App\Entity\Menu;
use App\Entity\ProductMenu;
use App\Entity\Product;
use App\Form\MenusFormType;
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

    #[Route('/admin/menus', name: 'menus')]
    public function getProductMenus(ProductMenuRepository $repository, MenuRepository $menuRepository, HourRepository $hourRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $hourFixtures = $hourRepository->findOneBy([]);

        $menu = $menuRepository->findOneBy(['nameMenu' => 'Menu Déjeuner_Aurore']);
        //dump($menu->getProductMenus());

        $productMenus = $repository->findBy([],['menu' => 'ASC']);


        $productMenuTest = $productMenus[0];
        //dump($productMenuTest->getProduct()->getCategory()->getNameCategory());

        $productMenus = $paginator->paginate(
            $repository->findBy([],['category' => 'ASC']),
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );

        return $this->render('admin/menus.html.twig', [
            'productMenus' => $productMenus,
            'menu' => $menu,
            'hourFixtures' => $hourFixtures,
        ]);
    }
    #[Route('/admin/newproductmenus', name: 'newproductmenus', methods: ['GET', 'POST'])]
    public function newProductMenus(HourRepository $hourRepository,Request $request, EntityManagerInterface $entityManager, ProductMenuRepository $productMenuRepository) : Response

    {
        $hourFixtures = $hourRepository->findOneBy([]);
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

    #[Route('/admin/editproductmenus/{id}', name: 'editproductmenus', methods: ['GET', 'POST'])]
    public function editProductMenus(HourRepository $hourRepository,Request $request, EntityManagerInterface $entityManager,MenuRepository $menuRepository,ProductMenuRepository $repository, int $id): Response
    {
        $hourFixtures = $hourRepository->findOneBy([]);

        $menu = $menuRepository->findOneBy(['nameMenu' => 'Menu Déjeuner_Aurore']);
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
    #[Route('/admin/deleteproductmenus/{id}', name: 'deleteproductmenus', methods: ['GET'])]
    public function deleteProductMenus( EntityManagerInterface $entityManager, ProductMenu $productMenus): Response
    {
        $entityManager->remove($productMenus);
        $entityManager->flush();

        return $this->redirectToRoute("menus");
    }


    #[Route('/admin/createmenus', name: 'createmenus')]
    public function index (HourRepository $hourRepository, MenuRepository $menuRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $hourFixtures = $hourRepository->findOneBy([]);

        $menus = $paginator->paginate(
            $menuRepository->findAll(),
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );

        return $this->render('admin/createmenus.html.twig', [

            'hourFixtures' => $hourFixtures,
            'menus' => $menus,
        ]);
    }

   #[Route('/admin/newmenus', name: 'newmenus', methods: ['GET', 'POST'])]
   public function newMenus(HourRepository $hourRepository,Request $request, EntityManagerInterface $entityManager, MenuRepository $menuRepository):Response
   {
       $hourFixtures = $hourRepository->findOneBy([]);
       $menus = new Menu ();

       $form = $this->createForm(MenusFormType::class, $menus);

       $form->handleRequest($request);
       if ($form->isSubmitted() && $form->isValid()){
           $menus = $form->getData();
           $entityManager->persist($menus);
           $entityManager->flush();
           return $this->redirectToRoute('createmenus');
       }

       return $this->render('admin/newmenus.html.twig', [

           'hourFixtures' => $hourFixtures,
           'form' => $form->createView()

       ]);
   }

     #[Route('/admin/editmenus/{id}', name: 'editmenus', methods: ['GET', 'POST'])]
     public function editMenus(HourRepository $hourRepository,Request $request, EntityManagerInterface $entityManager,MenuRepository $menuRepository,int $id): Response
     {
         $hourFixtures = $hourRepository->findOneBy([]);

         $menus = $menuRepository->findOneBy(["id" => $id]);
         $form = $this->createForm(MenusFormType::class, $menus);
         $form->handleRequest($request);
         if ($form->isSubmitted() && $form->isValid()){
             $entityManager->persist($menus);
             $entityManager->flush();
             return $this->redirectToRoute('createmenus');
         }

         return $this->render('admin/editmenus.html.twig', [

             'hourFixtures' => $hourFixtures,
             'form' => $form->createView()

         ]);

     }

    #[Route('/admin/deletemenus/{id}', name: 'deletemenus', methods: ['GET'])]
    public function deleteMenus( EntityManagerInterface $entityManager, Menu $menus): Response
    {
        $entityManager->remove($menus);
        $entityManager->flush();

        return $this->redirectToRoute("createmenus");
    }

}
