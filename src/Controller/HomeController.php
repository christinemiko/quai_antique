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
         $hourFixtures = $repository->find(33);
         $picture = $pictureRepository->find(19);
         dump( $picture->getProduct());

         $picture2 = $pictureRepository->find(20);
         dump( $picture2->getProduct());

         $picture3 = $pictureRepository->find(21);
         dump( $picture3->getProduct());

         return $this->render( 'homepage.html.twig', [
             'hourFixtures' => $hourFixtures,
             'picture' => $picture,
             'picture2' => $picture2,
             'picture3' => $picture3,
         ]);

     }

     #[Route('histoire')]
     public function Histoire(HourRepository $repository,PictureRepository $pictureRepository) : Response
     {
         $hourFixtures = $repository->find(33);
         $picture = $pictureRepository->find(22);
         dump( $picture->getProduct());

         return $this->render('history.html.twig', [
             'hourFixtures' => $hourFixtures,
             'picture' => $picture,
         ]);
     }


     #[Route('accescontact')]
     public function Acces(HourRepository $repository) : Response
     {
         $hourFixtures = $repository->find(33);
         return $this->render('acces.html.twig',[
         'hourFixtures' => $hourFixtures
             ]);
     }

     #[Route('instagram')]
     public function Instagram() : Response
     {
         return $this->redirect("https://www.instagram.com/polpobrasserie/");
     }

     #[Route('facebook')]
     public function Facebook() : Response
     {
         return $this->redirect("https://www.facebook.com/PolpoBrasserie/?fref=ts");
     }

     #[Route('askreservation')]
     public function AskReservation(HourRepository $repository) : Response
     {
         $hourFixtures = $repository->find(33);
         return $this->render('askreservation.html.twig',[
             'hourFixtures' => $hourFixtures
         ]);
     }
 }

