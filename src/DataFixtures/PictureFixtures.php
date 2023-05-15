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
        $picture->setnamePicture("plat2.jpg");
        $manager->persist($picture);

        $picture = new Picture();
        $picture->setnamePicture("plat8.jpg");
        $manager->persist($picture);

        $picture = new Picture();
        $picture->setnamePicture("plat14.jpg");
        $manager->persist($picture);

        $picture = new Picture();
        $picture->setnamePicture("plat9.jpg");
        $manager->persist($picture);

        $manager->flush();



    }
}