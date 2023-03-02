<?php

namespace App\Controller\Admin;


use App\Entity\Picture;
use App\Form\PicturesFormType;
use App\Repository\HourRepository;
use App\Repository\PictureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class PicturesController extends AbstractController
{

    #[Route('/admin/pictures', name: 'app_admin_pictures')]
    public function showpictures (HourRepository $hourRepository, PictureRepository $pictureRepository,PaginatorInterface $paginator, Request $request): Response
    {
        $hourFixtures = $hourRepository->find(33);

        $pictures = $pictureRepository->findAll();

        $picturesTest =  $pictures[0];
        dump( $picturesTest->getProduct());

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

    #[Route('/admin/newpictures', name: 'app_admin_newpictures', methods: ['GET', 'POST'])]
    public function newPictures(HourRepository $hourRepository,Request $request, EntityManagerInterface $entityManager, PictureRepository $pictureRepository, SluggerInterface $slugger):Response
    {
        $hourFixtures = $hourRepository->find(33);

        $pictures = new Picture ();

        $form = $this->createForm(PicturesFormType::class,$pictures);

        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()){

            /** @var UploadedFile $linkFile */
            $linkFile = $form->get('link')->getData();

            if($linkFile) {
                $originalFilename = pathinfo($linkFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $link = $safeFilename. '-' .uniqid('', true).'.'.$linkFile->guessExtension();

                $linkFile->move(
                    $this->getParameter('pictures_directory'),
                    $link
                );

                $pictures->setLink($link);
            }

            $pictures = $form->getData();
            $entityManager->persist($pictures);
            $entityManager->flush();
            return $this->redirectToRoute('pictures');
       }

        return $this->render('admin/newpictures.html.twig', [

            'hourFixtures' => $hourFixtures,
            'form' => $form->createView()

        ]);
    }

}

