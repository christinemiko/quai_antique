<?php

namespace App\Controller\Admin;


use App\Entity\Picture;
use App\Entity\ProductMenu;
use App\Form\HoursFormType;
use App\Form\PicturesFormType;
use App\Repository\HourRepository;
use App\Repository\MenuRepository;
use App\Repository\PictureRepository;
use App\Repository\ProductMenuRepository;
use App\Service\PictureService;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use function PHPUnit\Framework\throwException;

class PicturesController extends AbstractController
{

    #[Route('/admin/pictures', name: 'pictures')]
    public function showpictures (HourRepository $hourRepository, PictureRepository $pictureRepository,PaginatorInterface $paginator, Request $request): Response
    {
        $hourFixtures = $hourRepository->findOneBy([]);

        $pictures = $pictureRepository->findAll();

        $picturesTest =  $pictures[0];
        //dump( $picturesTest->getProduct());

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

    #[Route('/admin/newpictures', name: 'newpictures', methods: ['GET', 'POST'])]
    public function newPictures(HourRepository $hourRepository,Request $request, EntityManagerInterface $entityManager,
                                PictureRepository $pictureRepository, SluggerInterface $slugger):Response
    {
        $hourFixtures = $hourRepository->findOneBy([]);

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

                try{
                    $linkFile->move(
                        $this->getParameter('pictures_directory'),
                        $link
                    );
                } catch (FileException $exception){
                    throwException($exception);
                }

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

    #[Route('/admin/editpictures/{id}', name: 'editpictures', methods: ['GET', 'POST'])]
    public function editPictures(HourRepository $hourRepository,Request $request, EntityManagerInterface $entityManager,
         SluggerInterface $slugger,PictureRepository $pictureRepository, int $id): Response
    {
        $hourFixtures = $hourRepository->findOneBy([]);
        $pictures = $pictureRepository->findOneBy(["id" => $id]);

        $form = $this->createForm(PicturesFormType::class,$pictures);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            /** @var UploadedFile $linkFile */

            $linkFile = $form->get('link')->getData();

            if($linkFile) {
                $originalFilename = pathinfo($linkFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $link = $safeFilename. '-' .uniqid('', true).'.'.$linkFile->guessExtension();

                try{
                    $linkFile->move(
                        $this->getParameter('pictures_directory'),
                        $link
                    );
                } catch (FileException $exception){
                    throwException($exception);
                }

                $pictures->setLink($link);
            }

            $pictures = $form->getData();
            $entityManager->persist($pictures);
            $entityManager->flush();
            return $this->redirectToRoute('pictures');
        }

        return $this->render('admin/editpictures.html.twig', [

            'hourFixtures' => $hourFixtures,
            'form' => $form->createView()

        ]);
    }

    #[Route('/admin/deletepictures/{id}', name: 'deletepictures', methods: ['GET'])]
    public function deletePictures( EntityManagerInterface $entityManager, Picture $pictures): Response
    {
        $entityManager->remove($pictures);
        $entityManager->flush();

        return $this->redirectToRoute("pictures");
    }


}

