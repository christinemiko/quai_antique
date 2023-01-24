<?php
 namespace App\Controller;

 use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
 use Symfony\Component\HttpFoundation\Response;
 use Symfony\Component\Routing\Annotation\Route;


 class HomeController extends AbstractController
 {

     #[Route('Accueil')]
     public function Accueil() : Response
     {
         return $this->render("homepage.html.twig");
     }

     #[Route('Histoire')]
     public function Histoire() : Response
     {
         return $this->render("history.html.twig");
     }

     #[Route('A la Carte')]
     public function AlaCarte() : Response
     {
         return $this->render("cardmenu.html.twig");
     }

     #[Route('Menu Déjeuner')]
     public function MenuDejeuner() : Response
     {
         return $this->render("lunchmenu.html.twig");
     }

     #[Route('Menu Diner')]
     public function MenuDiner() : Response
     {
         return $this->render("dinnermenu.html.twig");
     }

     #[Route('Réservation')]
     public function Reservation() : Response
     {
         return $this->render("reservation.html.twig");
     }

     #[Route('Infos')]
     public function Info() : Response
     {
         return $this->render("info.html.twig");
     }

     #[Route('Se Connecter')]
     public function Login() : Response
     {
         return $this->render("login.html.twig");
     }

     #[Route('S/Inscrire')]
     public function Subscribe() : Response
     {
         return $this->render("subscribe.html.twig");
     }


 }