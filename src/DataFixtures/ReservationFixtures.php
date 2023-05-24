<?php

namespace App\DataFixtures;
use App\Entity\Reservation;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ReservationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        /* DONNEES PICTURES START */
        $reservation = new Reservation();
        $user = $manager->getRepository(User::class)->find(1);
        $reservation->setUser($user);
        $reservation->setHourReservation(new \DateTime('12:00:00'));
        $reservation->setDateReservation(new \DateTime('2023_05_15'));
        $reservation->setNumberPerson(2);
        $manager->persist($reservation);

        $reservation = new Reservation();
        $user = $manager->getRepository(User::class)->find(2);
        $reservation->setUser($user);
        $reservation->setHourReservation(new \DateTime('13:00:00'));
        $reservation->setDateReservation(new \DateTime('2023_05_20'));
        $reservation->setNumberPerson(5);
        $manager->persist($reservation);

        $manager->flush();



    }
}