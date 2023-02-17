<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type:"integer")]
    private ?int $id = null;

    #[ORM\Column(type:"string",length: 150)]
    private ?string $nameProduct = null;

    #[ORM\Column(type:"integer",length: 11)]
    private ?int $unitPrice = null;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: ProductMenu::class)]
    private Collection $productMenus;

    #[ORM\Column(length: 150)]
    private ?string $destination = null;


    #[ORM\ManyToOne(inversedBy: 'products')]
    private ?Category $category = null;


    public function __construct()
    {
        $this->productMenus = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameProduct(): ?string
    {
        return $this->nameProduct;
    }

    public function setNameProduct(string $nameProduct): self
    {
        $this->nameProduct = $nameProduct;

        return $this;
    }

    public function getUnitPrice(): ?int
    {
        return $this->unitPrice;
    }

    public function setUnitPrice(int $unitPrice): self
    {
        $this->unitPrice = $unitPrice;

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
            $productMenu->setProduct($this);
        }

        return $this;
    }

    public function removeProductMenu(ProductMenu $productMenu): self
    {
        if ($this->productMenus->removeElement($productMenu)) {
            // set the owning side to null (unless already changed)
            if ($productMenu->getProduct() === $this) {
                $productMenu->setProduct(null);
            }
        }

        return $this;
    }

    public function getDestination(): ?string
    {
        return $this->destination;
    }

    public function setDestination(string $destination): self
    {
        $this->destination = $destination;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }







}
