<?php
 namespace App\Controller;

 use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
 use Symfony\Component\HttpFoundation\Response;
 use Symfony\Component\Routing\Annotation\Route;


 class HomeController extends AbstractController
 {

     #[Route('accueil')]
     public function Accueil() : Response
     {
         return $this->render("homepage.html.twig");
     }

     #[Route('histoire')]
     public function Histoire() : Response
     {
         return $this->render("history.html.twig");
     }

     #[Route('alacarte')]
     public function AlaCarte() : Response
     {
         return $this->render("cardmenu.html.twig");
     }

     #[Route('menudéjeuner')]
     public function MenuDejeuner() : Response
     {
         return $this->render("lunchmenu.html.twig");
     }

     #[Route('menudiner')]
     public function MenuDiner() : Response
     {
         return $this->render("dinnermenu.html.twig");
     }

     #[Route('reservation')]
     public function Reservation() : Response
     {
         return $this->render("reservation.html.twig");
     }

     #[Route('accescontact')]
     public function Acces() : Response
     {
         return $this->render("acces.html.twig");
     }

     #[Route('seconnecter')]
     public function Login() : Response
     {
         return $this->render("login.html.twig");
     }

     #[Route('sinscrire')]
     public function Subscribe() : Response
     {
         return $this->render("subscribe.html.twig");
     }

     #[Route('oubli')]
     public function ForgetPassword() : Response
     {
         return $this->render("forgetpassword.html.twig");
     }

 }