<?php

namespace App\DataFixtures;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        /* DONNEES CATEGORY START */

        $category = new Category ();
        $category ->setNameCategory('Entrée');
        $manager->persist($category);
        $this->addReference('categoryEntree', $category);


        $category = new Category ();
        $category ->setNameCategory('Viande');
        $manager->persist($category);
        $this->addReference('categoryViande', $category);


        $category = new Category ();
        $category ->setNameCategory('Poisson');
        $manager->persist($category);
        $this->addReference('categoryPoisson', $category);


        $category = new Category ();
        $category ->setNameCategory('Fromage');
        $manager->persist($category);
        $this->addReference('categoryFromage', $category);


        $category = new Category ();
        $category ->setNameCategory('Dessert');
        $manager->persist($category);
        $this->addReference('categoryDessert', $category);


        $category = new Category ();
        $category ->setNameCategory('Boisson');
        $manager->persist($category);
        $this->addReference('categoryBoisson', $category);


        $category = new Category ();
        $category ->setNameCategory('Alcool');
        $manager->persist($category);
        $this->addReference('categoryAlcool', $category);

        $manager->flush();


        /* DONNEES CATEGORY END */



    }

}
