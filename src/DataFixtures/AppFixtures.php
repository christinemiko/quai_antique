<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Hour;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $category = new Category ();
        $category ->setNameCategory('Entrée');
        $manager->persist($category);
        $manager->flush();

        $category = new Category ();
        $category ->setNameCategory('Viande');
        $manager->persist($category);
        $manager->flush();

        $category = new Category ();
        $category ->setNameCategory('Poisson');
        $manager->persist($category);
        $manager->flush();

        $category = new Category ();
        $category ->setNameCategory('Fromage');
        $manager->persist($category);
        $manager->flush();

        $category = new Category ();
        $category ->setNameCategory('Dessert');
        $manager->persist($category);
        $manager->flush();

        $category = new Category ();
        $category ->setNameCategory('Boisson');
        $manager->persist($category);
        $manager->flush();

        $category = new Category ();
        $category ->setNameCategory('Alcool');
        $manager->persist($category);
        $manager->flush();

        $hour = new Hour ();
        $hour ->setDay('Du Lundi au Samedi');
        $hour ->setHour('De 11h45 à 14h00 et de 19h00 à 22h00');
        $manager->persist($hour);
        $manager->flush();




    }

}
