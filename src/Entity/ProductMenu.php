<?php

namespace App\Entity;

use App\Repository\ProductMenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductMenuRepository::class)]
class ProductMenu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $newProductMenu = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNewProductMenu(): ?string
    {
        return $this->newProductMenu;
    }

    public function setNewProductMenu(string $newProductMenu): self
    {
        $this->newProductMenu = $newProductMenu;

        return $this;
    }



}
