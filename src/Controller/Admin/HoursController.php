<?php

namespace App\Controller\Admin;

use App\Repository\HourRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HoursController extends AbstractController
{

    #[Route('/admin/hours', name: 'app_admin_hours')]
    public function showhours (HourRepository $hourRepository,PaginatorInterface $paginator, Request $request): Response
    {
        $hourFixtures = $hourRepository->find(33);


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
}

