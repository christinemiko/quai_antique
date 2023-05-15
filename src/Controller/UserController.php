<?php

namespace App\Controller;
use App\Entity\User;
use App\Repository\HourRepository;
use App\Repository\PictureRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user', methods: ['GET'])]
    public function index( HourRepository $hourRepository, PictureRepository $pictureRepository,): Response
    {
        $hourFixtures = $hourRepository->findOneBy([]);

        $picture = $pictureRepository->findOneBy(['namePicture' => 'plat2.jpg']);
        //dump( $picture->getProduct());

        $picture2 = $pictureRepository->findOneBy(['namePicture' => 'plat8.jpg']);
        //dump( $picture2->getProduct());

        $picture3 = $pictureRepository->findOneBy(['namePicture' => 'plat14.jpg']);
        //dump( $picture3->getProduct());

        return $this->render('homepage.html.twig', [
            'hourFixtures' => $hourFixtures,
            'picture' => $picture,
            'picture2' => $picture2,
            'picture3' => $picture3,

        ]);
    }
    #[Route('/moncompte', name: 'moncompte')]
    public function myAccount(HourRepository $repository) : Response
    {
        $hourFixtures = $repository->findOneBy([]);
        return $this->render('moncompte.html.twig',[
            'hourFixtures' => $hourFixtures
        ]);
    }

    #[Route('confirmdeletemoncompte', name: 'confirmdeletemoncompte' )]
    public function confirm ( UserRepository $userRepository,HourRepository $hourRepository) : Response
    {
        $hourFixtures =  $hourRepository->findOneBy([]);
        return $this->render('deletemoncompte.html.twig', [
            'hourFixtures' => $hourFixtures
        ]);
    }
    #[Route('deletemoncompte/{id}', name: 'deletemoncompte', methods: ['GET'])]
    public function delete( EntityManagerInterface $entityManager, User $user) : Response
    {
        $entityManager->remove($user);
        $entityManager->flush();

        return $this->redirectToRoute("accueil");
    }


}
