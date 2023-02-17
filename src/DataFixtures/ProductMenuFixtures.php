<?php

namespace App\DataFixtures;
use App\Entity\ProductMenu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductMenuFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        /* PRODUCT MENU FIXTURES START */

        /* MENU DEJEUNER START*/

        /*  ENTREE MENU FIXTURES START */

        $productMenu = new ProductMenu ();
        $productMenu ->setMenu($this->getReference('menuDejeuner'));
        $productMenu ->setProduct($this->getReference('menuEntree1'));
        $productMenu->setCategory($this->getReference('categoryEntree'));
        $manager->persist($productMenu);

        $productMenu = new ProductMenu ();
        $productMenu ->setMenu($this->getReference('menuDejeuner'));
        $productMenu ->setProduct($this->getReference('menuEntree2'));
        $productMenu->setCategory($this->getReference('categoryEntree'));
        $manager->persist($productMenu);

        $productMenu = new ProductMenu ();
        $productMenu ->setMenu($this->getReference('menuDejeuner'));
        $productMenu ->setProduct($this->getReference('menuEntree3'));
        $productMenu->setCategory($this->getReference('categoryEntree'));
        $manager->persist($productMenu);

        /*  ENTREE MENU FIXTURES END */

        /*  PLAT MENU FIXTURES START */
        $productMenu = new ProductMenu ();
        $productMenu ->setMenu($this->getReference('menuDejeuner'));
        $productMenu ->setProduct($this->getReference('menuPlat1'));
        $productMenu->setCategory($this->getReference('categoryViande'));
        $manager->persist($productMenu);

        $productMenu = new ProductMenu ();
        $productMenu ->setMenu($this->getReference('menuDejeuner'));
        $productMenu ->setProduct($this->getReference('menuPlat2'));
        $productMenu->setCategory($this->getReference('categoryViande'));
        $manager->persist($productMenu);

        $productMenu = new ProductMenu ();
        $productMenu ->setMenu($this->getReference('menuDejeuner'));
        $productMenu ->setProduct($this->getReference('menuPlat3'));
        $productMenu->setCategory($this->getReference('categoryViande'));
        $manager->persist($productMenu);

        /*  PLAT MENU FIXTURES END */

        /*  DESSERT MENU FIXTURES START */
        $productMenu = new ProductMenu ();
        $productMenu ->setMenu($this->getReference('menuDejeuner'));
        $productMenu ->setProduct($this->getReference('menuDessert1'));
        $productMenu->setCategory($this->getReference('categoryDessert'));
        $manager->persist($productMenu);

        $productMenu = new ProductMenu ();
        $productMenu ->setMenu($this->getReference('menuDejeuner'));
        $productMenu ->setProduct($this->getReference('menuDessert2'));
        $productMenu->setCategory($this->getReference('categoryDessert'));
        $manager->persist($productMenu);

        $productMenu = new ProductMenu ();
        $productMenu ->setMenu($this->getReference('menuDejeuner'));
        $productMenu ->setProduct($this->getReference('menuDessert3'));
        $productMenu->setCategory($this->getReference('categoryDessert'));
        $manager->persist($productMenu);

        /*  DESSERT MENU FIXTURES END */

        /* MENU DEJEUNER END*/


        /* MENU DINER START*/
        $productMenu = new ProductMenu ();
        $productMenu ->setMenu($this->getReference('menuDiner'));
        $productMenu ->setProduct($this->getReference('menuEntree3'));
        $productMenu->setCategory($this->getReference('categoryEntree'));
        $manager->persist($productMenu);

        $productMenu = new ProductMenu ();
        $productMenu ->setMenu($this->getReference('menuDiner'));
        $productMenu ->setProduct($this->getReference('menuEntree4'));
        $productMenu->setCategory($this->getReference('categoryEntree'));
        $manager->persist($productMenu);


        $productMenu = new ProductMenu ();
        $productMenu ->setMenu($this->getReference('menuDiner'));
        $productMenu ->setProduct($this->getReference('menuEntree5'));
        $productMenu->setCategory($this->getReference('categoryEntree'));
        $manager->persist($productMenu);

        $productMenu = new ProductMenu ();
        $productMenu ->setMenu($this->getReference('menuDiner'));
        $productMenu ->setProduct($this->getReference('menuPlat4'));
        $productMenu->setCategory($this->getReference('categoryViande'));
        $manager->persist($productMenu);

        $productMenu = new ProductMenu ();
        $productMenu ->setMenu($this->getReference('menuDiner'));
        $productMenu ->setProduct($this->getReference('menuPlat5'));
        $productMenu->setCategory($this->getReference('categoryViande'));
        $manager->persist($productMenu);

        $productMenu = new ProductMenu ();
        $productMenu ->setMenu($this->getReference('menuDiner'));
        $productMenu ->setProduct($this->getReference('menuPlat6'));
        $productMenu->setCategory($this->getReference('categoryViande'));
        $manager->persist($productMenu);

        $productMenu = new ProductMenu ();
        $productMenu ->setMenu($this->getReference('menuDiner'));
        $productMenu ->setProduct($this->getReference('menuDessert4'));
        $productMenu->setCategory($this->getReference('categoryDessert'));
        $manager->persist($productMenu);

        $productMenu = new ProductMenu ();
        $productMenu ->setMenu($this->getReference('menuDiner'));
        $productMenu ->setProduct($this->getReference('menuDessert5'));
        $productMenu->setCategory($this->getReference('categoryDessert'));
        $manager->persist($productMenu);

        $productMenu = new ProductMenu ();
        $productMenu ->setMenu($this->getReference('menuDiner'));
        $productMenu ->setProduct($this->getReference('menuDessert2'));
        $productMenu->setCategory($this->getReference('categoryDessert'));
        $manager->persist($productMenu);


        /* MENU DINER END*/



        $manager->flush();


        /* PRODUCT MENU FIXTURES END */



    }

}
