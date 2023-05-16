<?php
 namespace App\Controller;

 use App\Repository\HourRepository;
 use App\Repository\PictureRepository;
 use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
 use Symfony\Component\HttpFoundation\Response;
 use Symfony\Component\Routing\Annotation\Route;


 class HomeController extends AbstractController
 {

     #[Route('/', 'accueil')]
     public function Accueil(HourRepository $repository, PictureRepository $pictureRepository) : Response
     {
         $hourFixtures = $repository->findOneBy([]);

         $onlinePictures = $pictureRepository->findBy(['statut' => 'online']);

         return $this->render( 'homepage.html.twig', [
             'hourFixtures' => $hourFixtures,
             'onlinePictures' => $onlinePictures,

         ]);

     }

     #[Route('histoire',  name: 'histoire')]
     public function Histoire(HourRepository $repository,PictureRepository $pictureRepository) : Response
     {
         $hourFixtures = $repository->findOneBy([]);

         return $this->render('history.html.twig', [
             'hourFixtures' => $hourFixtures,

         ]);
     }


     #[Route('accescontact', name: 'accescontact' )]
     public function Acces(HourRepository $repository) : Response
     {
         $hourFixtures = $repository->findOneBy([]);
         return $this->render('acces.html.twig',[
         'hourFixtures' => $hourFixtures
             ]);
     }

     #[Route('instagram', name: 'instagram')]
     public function Instagram() : Response
     {
         return $this->redirect("https://www.instagram.com/polpobrasserie/");
     }

     #[Route('facebook', name: 'facebook')]
     public function Facebook() : Response
     {
         return $this->redirect("https://www.facebook.com/PolpoBrasserie/?fref=ts");
     }

     #[Route('askreservation', name: 'askreservation')]
     public function AskReservation(HourRepository $repository) : Response
     {
         $hourFixtures = $repository->findOneBy([]);
         return $this->render('askreservation.html.twig',[
             'hourFixtures' => $hourFixtures
         ]);
     }
 }

