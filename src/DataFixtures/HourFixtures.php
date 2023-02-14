<?php

namespace App\DataFixtures;

use App\Entity\Hour;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class HourFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        /* DONNEES HOUR START */

        $hour = new Hour ();
        $hour ->setDay('Du Lundi au Samedi');
        $hour ->setHour('De 11h45 à 14h00 et de 19h00 à 22h00');
        $manager->persist($hour);
        $manager->flush();

        /* DONNEES HOUR END */


    }

}
