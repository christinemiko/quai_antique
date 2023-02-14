<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Hour;
use App\Entity\Menu;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        /* DONNEES CATEGORY START */
        /*$category = new Category ();
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

        /* DONNEES CATEGORY END */

        /* DONNEES HOUR START */

        /*$hour = new Hour ();
        $hour ->setDay('Du Lundi au Samedi');
        $hour ->setHour('De 11h45 à 14h00 et de 19h00 à 22h00');
        $manager->persist($hour);
        $manager->flush();

        /* DONNEES HOUR END */

        /* DONNEES MENU START */

        /*$menu = new Menu ();
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

        /* DONNEES MENU END */

        /* DONNEES PRODUCT START */

        /* DONNEES ENTREE START */

       /* $product = new Product ();
        $product ->setNameProduct('Tranches de Saint-Jacques à la truffe noire');
        $product ->setUnitPrice('38€');
        $product->setCategory($category);
        $manager->persist($product);
        $manager->flush();

        $product = new Product ();
        $product ->setNameProduct('Pâté en croute de canard et foie gras de canard');
        $product ->setUnitPrice('26€');
        $product->setCategory($category);
        $manager->persist($product);
        $manager->flush();

        $product = new Product ();
        $product ->setNameProduct('Tartare de daurade, huître Perle Noire');
        $product ->setUnitPrice('31€');
        $product->setCategory($category);
        $manager->persist($product);
        $manager->flush();

        $product = new Product ();
        $product ->setNameProduct('Langoustines rôties et gâteau de foie blond');
        $product ->setUnitPrice('36€');
        $manager->persist($product);
        $manager->flush();

        $product = new Product ();
        $product ->setNameProduct('Tartelette aux poireaux, beaufort d/alpage et truffe noire');
        $product ->setUnitPrice('33€');
        $manager->persist($product);
        $manager->flush();

        /* DONNEES ENTREE END */

        /* DONNEES VIANDE START */

       /* $product = new Product ();
        $product ->setNameProduct('Gigot d/agneau de nos régions rôti et son gratin dauphinois');
        $product ->setUnitPrice('41€');
        $manager->persist($product);
        $manager->flush();

        $product = new Product ();
        $product ->setNameProduct('Filet de boeuf à la casserole, tonnelets de pommes de terres rôtis');
        $product ->setUnitPrice('48€');
        $manager->persist($product);
        $manager->flush();

        $product = new Product ();
        $product ->setNameProduct('Tartare de boeuf de Salers, frites fraîches et salade de jeunes pousses');
        $product ->setUnitPrice('36€');
        $manager->persist($product);
        $manager->flush();

        $product = new Product ();
        $product ->setNameProduct('Traditionnelle blanquette de veau et son riz pilaf');
        $product ->setUnitPrice('39€');
        $manager->persist($product);
        $manager->flush();

        $product = new Product ();
        $product ->setNameProduct('Epaule d/agneau à la cuillère et son risotto d/épeautre, jus aux épices douces');
        $product ->setUnitPrice('98€');
        $manager->persist($product);
        $manager->flush();

        /* DONNEES VIANDE END */

        /* DONNEES POISSON START */

        /*$product = new Product ();
        $product ->setNameProduct('Mitonnée de poulpe à la provençale');
        $product ->setUnitPrice('35€');
        $manager->persist($product);
        $manager->flush();

        $product = new Product ();
        $product ->setNameProduct('Noix de Saint-Jacques à la Dieppoise et sa purée de légumes');
        $product ->setUnitPrice('43€');
        $manager->persist($product);
        $manager->flush();

        $product = new Product ();
        $product ->setNameProduct('Dos de Cabillaud à la truffe noire, chou-fleur et parmesan');
        $product ->setUnitPrice('46€');
        $manager->persist($product);
        $manager->flush();

        $product = new Product ();
        $product ->setNameProduct('Queue de lotte à la grenobloise et pomme purée');
        $product ->setUnitPrice('105€');
        $manager->persist($product);
        $manager->flush();

        $product = new Product ();
        $product ->setNameProduct('Tataki de thon et son ceviche à la mangue');
        $product ->setUnitPrice('45€');
        $manager->persist($product);
        $manager->flush();

        /* DONNEES POISSON END */

        /* DONNEES FROMAGES START */
        /*$product = new Product ();
        $product ->setNameProduct('Plateau de fromages affinés de nos régions');
        $product ->setUnitPrice('18€');
        $manager->persist($product);
        $manager->flush();

        $product = new Product ();
        $product ->setNameProduct('Trio de fromages de Savoie: l/Abondance, le Beaufort, le Chevrotin');
        $product ->setUnitPrice('12€');
        $manager->persist($product);
        $manager->flush();

        /* DONNEES FROMAGES END */

        /* DONNEES DESSERT START */

        /*$product = new Product ();
        $product ->setNameProduct('Soufflé à la châtaigne, sorbet à l/orange, saupoudré de croquants au chocolat');
        $product ->setUnitPrice('18€');
        $manager->persist($product);
        $manager->flush();

        $product = new Product ();
        $product ->setNameProduct('Baba Bouchon, rhum arrangé aux agrumes, crème fouettée à la vanille');
        $product ->setUnitPrice('18€');
        $manager->persist($product);
        $manager->flush();

        $product = new Product ();
        $product ->setNameProduct('Compressé de pommes et de coing, flambé au grand marnier , accompagné d/agrumes.');
        $product ->setUnitPrice('18€');
        $manager->persist($product);
        $manager->flush();

        $product = new Product ();
        $product ->setNameProduct('l/Opéra du Quai Antique,  croquant à la praline et chocolat noir');
        $product ->setUnitPrice('18€');
        $manager->persist($product);
        $manager->flush();

        $product = new Product ();
        $product ->setNameProduct('Millefeuille de crêpes Suzette flambées au Grand Marnier');
        $product ->setUnitPrice('18€');
        $manager->persist($product);
        $manager->flush();

        /* DONNEES DESSERT END */

        /* DONNEES BOISSON START */

        /*$product = new Product ();
        $product ->setNameProduct('Eau minérale Evian');
        $product ->setUnitPrice('50cl_ 5€ / 1L_ 7€');
        $manager->persist($product);
        $manager->flush();

        $product = new Product ();
        $product ->setNameProduct('Eau gazeuse Perrier');
        $product ->setUnitPrice('50cl_ 5€ / 1L_ 7€');
        $manager->persist($product);
        $manager->flush();

        $product = new Product ();
        $product ->setNameProduct('Thé et Infusions Mariages Frères');
        $product ->setUnitPrice('5€ / 7€');
        $manager->persist($product);
        $manager->flush();

        $product = new Product ();
        $product ->setNameProduct('Expresso Massaya Bio');
        $product ->setUnitPrice('3€');
        $manager->persist($product);
        $manager->flush();

        $product = new Product ();
        $product ->setNameProduct('Chocolat chaud, trésor de MONBANA');
        $product ->setUnitPrice('5€');
        $manager->persist($product);
        $manager->flush();


        /* DONNEES BOISSON END */

        /* DONNEES VINS START */

        /*$product = new Product ();
        $product ->setNameProduct('Champagne Perrier Jouët');
        $product ->setUnitPrice('12_cl 12€ / 1L_ 60€');
        $manager->persist($product);
        $manager->flush();

        $product = new Product ();
        $product ->setNameProduct('Vin Blanc Pouilly-Fumé AOP ');
        $product ->setUnitPrice('75_cl  40€');
        $manager->persist($product);
        $manager->flush();

        $product = new Product ();
        $product ->setNameProduct('Vin Rouge BOURGUEIL AOP');
        $product ->setUnitPrice('75_cl 40€');
        $manager->persist($product);
        $manager->flush();

        $product = new Product ();
        $product ->setNameProduct('Vin Rosé Côtes de Provence AOP');
        $product ->setUnitPrice('75_cl 32€');
        $manager->persist($product);
        $manager->flush();

        /* DONNEES VINS END */


        /* DONNEES PRODUCT END */

    }

}
