<?php

namespace App\Controller\Admin;

use App\Entity\Hour;
use App\Entity\Menu;
use App\Form\HoursFormType;
use App\Form\MenusFormType;
use App\Repository\HourRepository;
use App\Repository\MenuRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HoursController extends AbstractController
{

    #[Route('/admin/hours', name: 'hours')]
    public function index (HourRepository $hourRepository,PaginatorInterface $paginator, Request $request): Response
    {
        $hourFixtures = $hourRepository->findOneBy([]);


        $hours = $paginator->paginate(
            $hourRepository->findAll(),
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );
        return $this->render('admin/hours.html.twig', [
            'hourFixtures' => $hourFixtures,
            'hours' => $hours
        ]);
    }

     #[Route('/admin/newhours', name: 'newhours', methods: ['GET', 'POST'])]
     public function newHours(HourRepository $hourRepository,Request $request, EntityManagerInterface $entityManager): Response
     {
         $hourFixtures = $hourRepository->findOneBy([]);

         $hours = new Hour ();

         $form = $this->createForm(HoursFormType::class, $hours);

         $form->handleRequest($request);
         if ($form->isSubmitted() && $form->isValid()){
             $hours = $form->getData();
             $entityManager->persist($hours);
             $entityManager->flush();

             return $this->redirectToRoute('hours');
         }

         return $this->render('admin/newhours.html.twig', [

             'hourFixtures' => $hourFixtures,
             'form' => $form->createView()

         ]);
     }

    #[Route('/admin/edithours/{id}', name: 'edithours', methods: ['GET', 'POST'])]
    public function editHours(HourRepository $hourRepository,Request $request, EntityManagerInterface $entityManager,int $id): Response
    {
        $hourFixtures = $hourRepository->findOneBy([]);

        $hours = $hourRepository->findOneBy(["id" => $id]);
        $form = $this->createForm(HoursFormType::class, $hours);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($hours);
            $entityManager->flush();
            return $this->redirectToRoute('hours');
        }

        return $this->render('admin/edithours.html.twig', [

            'hourFixtures' => $hourFixtures,
            'form' => $form->createView()

        ]);

    }

    #[Route('/admin/deletehours/{id}', name: 'deletehours', methods: ['GET'])]
    public function deleteMenus( EntityManagerInterface $entityManager, Hour $hours): Response
    {
        $entityManager->remove($hours);
        $entityManager->flush();

        return $this->redirectToRoute("hours");
    }
}

