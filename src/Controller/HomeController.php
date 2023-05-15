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
        // $picture = $pictureRepository->findOneBy(['namePicture' => 'plat2.jpg']);
         //dump( $picture->getProduct());

         //$picture2 = $pictureRepository->findOneBy(['namePicture' => 'plat8.jpg']);
         //dump( $picture2->getProduct());

         //$picture3 = $pictureRepository->findOneBy(['namePicture' => 'plat14.jpg']);
         //dump( $picture3->getProduct());

         return $this->render( 'homepage.html.twig', [
             'hourFixtures' => $hourFixtures,
             'onlinePictures' => $onlinePictures,
             //'picture' => $picture,
             //'picture2' => $picture2,
             //'picture3' => $picture3,
         ]);

     }

     #[Route('histoire',  name: 'histoire')]
     public function Histoire(HourRepository $repository,PictureRepository $pictureRepository) : Response
     {
         $hourFixtures = $repository->findOneBy([]);
         $picture = $pictureRepository->findOneBy(['namePicture' => 'plat9.jpg']);
         //dump( $picture->getProduct());

         return $this->render('history.html.twig', [
             'hourFixtures' => $hourFixtures,
             'picture' => $picture,
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

