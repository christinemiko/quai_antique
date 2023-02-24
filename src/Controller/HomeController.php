<?php
 namespace App\Controller;

 use App\Repository\HourRepository;
 use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
 use Symfony\Component\HttpFoundation\Response;
 use Symfony\Component\Routing\Annotation\Route;


 class HomeController extends AbstractController
 {

     #[Route('/', 'accueil')]
     public function Accueil(HourRepository $repository) : Response
     {
         $hourFixtures = $repository->find(33);
         return $this->render( 'homepage.html.twig', [
             'hourFixtures' => $hourFixtures
         ]);

     }

     #[Route('histoire')]
     public function Histoire(HourRepository $repository) : Response
     {
         $hourFixtures = $repository->find(33);
         return $this->render('history.html.twig', [
             'hourFixtures' => $hourFixtures
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

