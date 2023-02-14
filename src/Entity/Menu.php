<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'menu', targetEntity: ProductMenu::class)]
    private Collection $productMenus;

    public function __construct()
    {
        $this->productMenus = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, ProductMenu>
     */
    public function getProductMenus(): Collection
    {
        return $this->productMenus;
    }

    public function addProductMenu(ProductMenu $productMenu): self
    {
        if (!$this->productMenus->contains($productMenu)) {
            $this->productMenus->add($productMenu);
            $productMenu->setMenu($this);
        }

        return $this;
    }

    public function removeProductMenu(ProductMenu $productMenu): self
    {
        if ($this->productMenus->removeElement($productMenu)) {
            // set the owning side to null (unless already changed)
            if ($productMenu->getMenu() === $this) {
                $productMenu->setMenu(null);
            }
        }

        return $this;
    }
}
