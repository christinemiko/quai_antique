<?php

namespace App\Controller\Admin;

use App\Repository\HourRepository;
use App\Repository\PictureRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PicturesController extends AbstractController
{

    #[Route('/admin/pictures', name: 'app_admin_pictures')]
    public function showpictures (HourRepository $hourRepository, PictureRepository $pictureRepository,PaginatorInterface $paginator, Request $request): Response
    {
        $hourFixtures = $hourRepository->find(33);


        $pictures = $paginator->paginate(
            $pictureRepository->findAll(),
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );

        return $this->render('admin/pictures.html.twig', [
            'hourFixtures' => $hourFixtures,
            'pictures' => $pictures
        ]);
    }
}

