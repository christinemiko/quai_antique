<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenuRepository::class)]
class Menu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?string $nameMenu = null;

    #[ORM\Column]
    private ?int $priceMenu = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameMenu(): ?string
    {
        return $this->nameMenu;
    }

    public function setNameMenu(string $nameMenu): self
    {
        $this->nameMenu = $nameMenu;

        return $this;
    }

    public function getPriceMenu(): ?int
    {
        return $this->priceMenu;
    }

    public function setPriceMenu(int $priceMenu): self
    {
        $this->priceMenu = $priceMenu;

        return $this;
    }
}
