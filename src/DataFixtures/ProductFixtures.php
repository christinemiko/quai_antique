<?php

namespace App\DataFixtures;
use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        /* DONNEES PRODUCT START */

        /* DONNEES ENTREE START */

        $product = new Product ();
        $product ->setNameProduct('Tranches de Saint-Jacques à la truffe noire');
        $product ->setUnitPrice(38);
        $product->setCategory($this->getReference('categoryEntree'));
        $manager->persist($product);


        $product = new Product ();
        $product ->setNameProduct('Pâté en croute de canard et foie gras de canard');
        $product ->setUnitPrice(26);
        $product->setCategory($this->getReference('categoryEntree'));
        $manager->persist($product);


        $product = new Product ();
        $product ->setNameProduct('Tartare de daurade, huître Perle Noire');
        $product ->setUnitPrice(31);
        $product->setCategory($this->getReference('categoryEntree'));
        $manager->persist($product);


        $product = new Product ();
        $product ->setNameProduct('Langoustines rôties et gâteau de foie blond');
        $product ->setUnitPrice(36);
        $product->setCategory($this->getReference('categoryEntree'));
        $manager->persist($product);


        $product = new Product ();
        $product ->setNameProduct('Tartelette aux poireaux, beaufort d/alpage et truffe noire');
        $product ->setUnitPrice(33);
        $product->setCategory($this->getReference('categoryEntree'));
        $manager->persist($product);


        /* DONNEES ENTREE END */

        /* DONNEES VIANDE START */

        $product = new Product ();
        $product ->setNameProduct('Gigot d/agneau de nos régions rôti et son gratin dauphinois');
        $product ->setUnitPrice(41);
        $product->setCategory($this->getReference('categoryViande'));
        $manager->persist($product);


        $product = new Product ();
        $product ->setNameProduct('Filet de boeuf à la casserole, tonnelets de pommes de terres rôtis');
        $product ->setUnitPrice(48);
        $product->setCategory($this->getReference('categoryViande'));
        $manager->persist($product);


        $product = new Product ();
        $product ->setNameProduct('Tartare de boeuf de Salers, frites fraîches et salade de jeunes pousses');
        $product ->setUnitPrice(36);
        $product->setCategory($this->getReference('categoryViande'));
        $manager->persist($product);


        $product = new Product ();
        $product ->setNameProduct('Traditionnelle blanquette de veau et son riz pilaf');
        $product ->setUnitPrice(39);
        $product->setCategory($this->getReference('categoryViande'));
        $manager->persist($product);


        $product = new Product ();
        $product ->setNameProduct('Epaule d/agneau à la cuillère et son risotto d/épeautre, jus aux épices douces');
        $product ->setUnitPrice(98);
        $product->setCategory($this->getReference('categoryViande'));
        $manager->persist($product);


        /* DONNEES VIANDE END */

        /* DONNEES POISSON START */

        $product = new Product ();
        $product ->setNameProduct('Mitonnée de poulpe à la provençale');
        $product ->setUnitPrice(35);
        $product->setCategory($this->getReference('categoryPoisson'));
        $manager->persist($product);


        $product = new Product ();
        $product ->setNameProduct('Noix de Saint-Jacques à la Dieppoise et sa purée de légumes');
        $product ->setUnitPrice(43);
        $product->setCategory($this->getReference('categoryPoisson'));
        $manager->persist($product);


        $product = new Product ();
        $product ->setNameProduct('Dos de Cabillaud à la truffe noire, chou-fleur et parmesan');
        $product ->setUnitPrice(46);
        $product->setCategory($this->getReference('categoryPoisson'));
        $manager->persist($product);


        $product = new Product ();
        $product ->setNameProduct('Queue de lotte à la grenobloise et pomme purée');
        $product ->setUnitPrice(105);
        $product->setCategory($this->getReference('categoryPoisson'));
        $manager->persist($product);


        $product = new Product ();
        $product ->setNameProduct('Tataki de thon et son ceviche à la mangue');
        $product ->setUnitPrice(45);
        $product->setCategory($this->getReference('categoryPoisson'));
        $manager->persist($product);


        /* DONNEES POISSON END */

        /* DONNEES FROMAGES START */
        $product = new Product ();
        $product ->setNameProduct('Plateau de fromages affinés de nos régions');
        $product ->setUnitPrice(18);
        $product->setCategory($this->getReference('categoryFromage'));
        $manager->persist($product);


        $product = new Product ();
        $product ->setNameProduct('Trio de fromages de Savoie: l/Abondance, le Beaufort, le Chevrotin');
        $product ->setUnitPrice(12);
        $product->setCategory($this->getReference('categoryFromage'));
        $manager->persist($product);


        /* DONNEES FROMAGES END */

        /* DONNEES DESSERT START */

        $product = new Product ();
        $product ->setNameProduct('Soufflé à la châtaigne, sorbet à l/orange, saupoudré de croquants au chocolat');
        $product ->setUnitPrice(18);
        $product->setCategory($this->getReference('categoryDessert'));
        $manager->persist($product);


        $product = new Product ();
        $product ->setNameProduct('Baba Bouchon, rhum arrangé aux agrumes, crème fouettée à la vanille');
        $product ->setUnitPrice(18);
        $product->setCategory($this->getReference('categoryDessert'));
        $manager->persist($product);


        $product = new Product ();
        $product ->setNameProduct('Compressé de pommes et de coing, flambé au grand marnier , accompagné d/agrumes.');
        $product ->setUnitPrice(18);
        $product->setCategory($this->getReference('categoryDessert'));
        $manager->persist($product);


        $product = new Product ();
        $product ->setNameProduct('l/Opéra du Quai Antique,  croquant à la praline et chocolat noir');
        $product ->setUnitPrice(18);
        $product->setCategory($this->getReference('categoryDessert'));
        $manager->persist($product);


        $product = new Product ();
        $product ->setNameProduct('Millefeuille de crêpes Suzette flambées au Grand Marnier');
        $product ->setUnitPrice(18);
        $product->setCategory($this->getReference('categoryDessert'));
        $manager->persist($product);


        /* DONNEES DESSERT END */

        /* DONNEES BOISSON START */

        $product = new Product ();
        $product ->setNameProduct('Eau minérale Evian');
        $product ->setUnitPrice(7);
        $product->setCategory($this->getReference('categoryBoisson'));
        $manager->persist($product);


        $product = new Product ();
        $product ->setNameProduct('Eau gazeuse Perrier');
        $product ->setUnitPrice('7');
        $product->setCategory($this->getReference('categoryBoisson'));
        $manager->persist($product);


        $product = new Product ();
        $product ->setNameProduct('Thé et Infusions Mariages Frères');
        $product ->setUnitPrice(7);
        $product->setCategory($this->getReference('categoryBoisson'));
        $manager->persist($product);


        $product = new Product ();
        $product ->setNameProduct('Expresso Massaya Bio');
        $product ->setUnitPrice(3);
        $product->setCategory($this->getReference('categoryBoisson'));
        $manager->persist($product);


        $product = new Product ();
        $product ->setNameProduct('Chocolat chaud, trésor de MONBANA');
        $product ->setUnitPrice(5);
        $product->setCategory($this->getReference('categoryBoisson'));
        $manager->persist($product);



        /* DONNEES BOISSON END */

        /* DONNEES VINS START */

        $product = new Product ();
        $product ->setNameProduct('Champagne Perrier Jouët');
        $product ->setUnitPrice(60);
        $product->setCategory($this->getReference('categoryAlcool'));
        $manager->persist($product);


        $product = new Product ();
        $product ->setNameProduct('Vin Blanc Pouilly-Fumé AOP ');
        $product ->setUnitPrice(40);
        $product->setCategory($this->getReference('categoryAlcool'));
        $manager->persist($product);


        $product = new Product ();
        $product ->setNameProduct('Vin Rouge BOURGUEIL AOP');
        $product ->setUnitPrice(40);
        $product->setCategory($this->getReference('categoryAlcool'));
        $manager->persist($product);


        $product = new Product ();
        $product ->setNameProduct('Vin Rosé Côtes de Provence AOP');
        $product ->setUnitPrice(32);
        $product->setCategory($this->getReference('categoryAlcool'));
        $manager->persist($product);


        $manager->flush();

        /* DONNEES VINS END */


        /* DONNEES PRODUCT END */

    }

}
