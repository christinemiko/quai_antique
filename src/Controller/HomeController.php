<?php
 namespace App\Controller;

 use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
 use Symfony\Component\HttpFoundation\Response;
 use Symfony\Component\Routing\Annotation\Route;


 class HomeController extends AbstractController
 {

     #[Route('/', 'accueil', methods:['GET'])]
     public function Accueil() : Response
     {
         return $this->render("homepage.html.twig");
     }

     #[Route('histoire')]
     public function Histoire() : Response
     {
         return $this->render("history.html.twig");
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


     #[Route('oubli_motdepasse')]
     public function ForgetPassword() : Response
     {
         return $this->render("forgetpassword.html.twig");
     }

     #[Route('change_motdepasse')]
     public function ChangePassword() : Response
     {
         return $this->render("changepassword.html.twig");
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

     #[Route('moncompte')]
     public function MyAccount() : Response
     {
         return $this->render("moncompte.html.twig");
     }
 }

