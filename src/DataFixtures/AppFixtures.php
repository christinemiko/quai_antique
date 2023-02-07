<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Hour;
use App\Entity\Menu;
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

        $menu = new Menu ();
        $menu ->setProductName1('Tartare de Daurade et dès de mangues');
        $menu ->setProductName2('Oeufs à la truffe');
        $menu ->setProductName3('Tartelette aux poireaux, beaufort d/alpage');
        $menu ->setProductName4('Dos de cabillaud, chou-fleur et parmesan');
        $menu ->setProductName5('Filet de boeuf à la casserole, tonnelets de pomme de terre rôtis et topinambours');
        $menu ->setProductName6('Gnocchis de châtaigne accompagnés de champignons forestiers');
        $menu ->setProductName7('Chocolat Poire et cerfeuil');
        $menu ->setProductName8('Crêpes suzette flambées au grand Marnier');
        $menu ->setProductName9('Baba Bouchon au Rhum et ses agrumes');
        $menu ->setNameMenu('Menu Déjeuner_Aurore');
        $manager->persist($menu);
        $manager->flush();

        $menu = new Menu ();
        $menu ->setProductName1('Tranches de Saint-Jacques à la truffe noire');
        $menu ->setProductName2('Langoustines rôties et gâteau de foie blond');
        $menu ->setProductName3('Légumes d/antan braisés accompagnés d/une brioche feuilleté aux épices');
        $menu ->setProductName4('Noix de saint Jacques à la Dieppoise');
        $menu ->setProductName5('Gigot d/agneau de nos régions, rôtis et son gratin dauphinois');
        $menu ->setProductName6('Soufflé au potiron et ses pommes purée');
        $menu ->setProductName7('Croquant au Chocolat');
        $menu ->setProductName8('Cigare croustillant, crème légère au Cognac');
        $menu ->setProductName9('Café ou thé Gourmand');
        $menu ->setNameMenu('Menu Dîner_Crepuscule');

        $manager->persist($menu);
        $manager->flush();



    }

}
