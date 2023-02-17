<?php

namespace App\Entity;

use App\Repository\HourRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HourRepository::class)]
class Hour
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?string $day = null;

    #[ORM\Column]
    private ?string $hourtime = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDay(): ?string
    {
        return $this->day;
    }

    public function setDay(string $day): self
    {
        $this->day = $day;

        return $this;
    }

    public function getHourtime(): ?string
    {
        return $this->hourtime;
    }

    public function setHour(string $hourtime): self
    {
        $this->hourtime = $hourtime;

        return $this;
    }
}
