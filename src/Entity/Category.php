<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?string $nameCategory = null;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Product::class)]
    private Collection $products;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: ProductMenu::class)]
    private Collection $productMenus;

    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->productMenus = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameCategory(): ?string
    {
        return $this->nameCategory;
    }

    public function setNameCategory(string $nameCategory): self
    {
        $this->nameCategory = $nameCategory;

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products->add($product);
            $product->setCategory($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getCategory() === $this) {
                $product->setCategory(null);
            }
        }

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
            $productMenu->setCategory($this);
        }

        return $this;
    }

    public function removeProductMenu(ProductMenu $productMenu): self
    {
        if ($this->productMenus->removeElement($productMenu)) {
            // set the owning side to null (unless already changed)
            if ($productMenu->getCategory() === $this) {
                $productMenu->setCategory(null);
            }
        }

        return $this;
    }



}
