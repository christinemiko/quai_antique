<?php

namespace App\DataFixtures;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        /* DONNEES USER START */
        $user = new User();
        $user->setEmail('marine@gmail.com');
        $user->setRoles(['CLIENT']);
        $user->setPassword('$2y$13$OZJmWunEb1nUoqWSd45Hj.0qfwuI7/wQF.JVL6p2KfKCw.MrZxIdW');
        $user->setLastName('Legouic');
        $user->setFirstName('Marine');
        $user->setAllergie('No allergie');
        $user->setPhoneNumber('06 14 85 78 22');
        $manager->persist($user);

        $user = new User();
        $user->setEmail('martin@gmail.com');
        $user->setRoles(['ADMIN']);
        $user->setPassword('$2y$13$n2GwaHX8WT2SkrUxHUgrSudkLvAuEIBSLKalFfqlnoMDSFTqUy/de');
        $user->setLastName('COME');
        $user->setFirstName('Martin');
        $user->setAllergie('No allergie');
        $user->setPhoneNumber('06 52 45 11 22');
        $manager->persist($user);


        $manager->flush();



    }
}