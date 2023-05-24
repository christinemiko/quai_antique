<?php

namespace App\DataFixtures;
use App\Entity\Picture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PictureFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        /* DONNEES PICTURES START */
        $picture = new Picture();
        $picture->setnamePicture("Gigot d'agneau de nos régions rôti et son gratin dauphinois");
        $picture->setStatut("online");
        $picture->setLink("plat2-6462251de01126.32014068.jpg");
        $manager->persist($picture);

        $picture = new Picture();
        $picture->setnamePicture("l'Opéra du Quai Antique, croquant à la praline et chocolat noir");
        $picture->setStatut("online");
        $picture->setLink("plat8-6462253e51e144.98041860.jpg");
        $manager->persist($picture);

        $picture = new Picture();
        $picture->setnamePicture("Compressé de pommes et de coing, flambé au grand marnier , accompagné d'agrumes");
        $picture->setStatut("online");
        $picture->setLink("plat14-6462254c14d005.28082225.jp");
        $manager->persist($picture);

        $picture = new Picture();
        $picture->setStatut("offline");
        $picture->setnamePicture("baba au rhum");
        $picture->setLink("plat4-6462512feb6f51.94831539.jpg");
        $manager->persist($picture);

        $manager->flush();



    }
}