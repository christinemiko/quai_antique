<?php

namespace App\DataFixtures;
use App\Entity\Menu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MenuFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        /* DONNEES MENU START */

        $menu = new Menu ();

        $menu ->setNameMenu('Menu Déjeuner_Aurore');
        $menu ->setPriceMenu(59);
        $manager->persist($menu);
        $this->addReference('menuDejeuner', $menu);


        $menu = new Menu ();

        $menu ->setNameMenu('Menu Dîner_Crepuscule');
        $menu ->setPriceMenu(79);
        $manager->persist($menu);
        $this->addReference('menuDiner', $menu);

        $manager->flush();

        /* DONNEES MENU END */


    }

}
