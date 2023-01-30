<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $hour_reservation = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_reservation = null;

    #[ORM\Column]
    private ?int $number_person = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $message = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHourReservation(): ?\DateTimeInterface
    {
        return $this->hour_reservation;
    }

    public function setHourReservation(\DateTimeInterface $hour_reservation): self
    {
        $this->hour_reservation = $hour_reservation;

        return $this;
    }

    public function getDateReservation(): ?\DateTimeInterface
    {
        return $this->date_reservation;
    }

    public function setDateReservation(\DateTimeInterface $date_reservation): self
    {
        $this->date_reservation = $date_reservation;

        return $this;
    }

    public function getNumberPerson(): ?int
    {
        return $this->number_person;
    }

    public function setNumberPerson(int $number_person): self
    {
        $this->number_person = $number_person;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): self
    {
        $this->message = $message;

        return $this;
    }
}
