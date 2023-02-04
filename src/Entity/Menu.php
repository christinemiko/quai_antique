<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenuRepository::class)]
class Menu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type:"integer")]
    private ?int $id = null;

    #[ORM\Column(type:"string", length: 255)]
    private ?string $product_name1 = null;

    #[ORM\Column(type:"string",length: 255)]
    private ?string $product_name2 = null;

    #[ORM\Column(type:"string",length: 255)]
    private ?string $product_name3 = null;

    #[ORM\Column(type:"string",length: 255)]
    private ?string $product_name4 = null;

    #[ORM\Column(type:"string",length: 255)]
    private ?string $product_name5 = null;

    #[ORM\Column(type:"string",length: 255)]
    private ?string $product_name6 = null;

    #[ORM\Column(type:"string",length: 255)]
    private ?string $product_name7 = null;

    #[ORM\Column(type:"string",length: 255)]
    private ?string $product_name8 = null;

    #[ORM\Column(type:"string",length: 255)]
    private ?string $product_name9 = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductName1(): ?string
    {
        return $this->product_name1;
    }

    public function setProductName1(string $product_name1): self
    {
        $this->product_name1 = $product_name1;

        return $this;
    }

    public function getProductName2(): ?string
    {
        return $this->product_name2;
    }

    public function setProductName2(string $product_name2): self
    {
        $this->product_name2 = $product_name2;

        return $this;
    }

    public function getProductName3(): ?string
    {
        return $this->product_name3;
    }

    public function setProductName3(string $product_name3): self
    {
        $this->product_name3 = $product_name3;

        return $this;
    }

    public function getProductName4(): ?string
    {
        return $this->product_name4;
    }

    public function setProductName4(string $product_name4): self
    {
        $this->product_name4 = $product_name4;

        return $this;
    }

    public function getProductName5(): ?string
    {
        return $this->product_name5;
    }

    public function setProductName5(string $product_name5): self
    {
        $this->product_name5 = $product_name5;

        return $this;
    }

    public function getProductName6(): ?string
    {
        return $this->product_name6;
    }

    public function setProductName6(string $product_name6): self
    {
        $this->product_name6 = $product_name6;

        return $this;
    }

    public function getProductName7(): ?string
    {
        return $this->product_name7;
    }

    public function setProductName7(string $product_name7): self
    {
        $this->product_name7 = $product_name7;

        return $this;
    }

    public function getProductName8(): ?string
    {
        return $this->product_name8;
    }

    public function setProductName8(string $product_name8): self
    {
        $this->product_name8 = $product_name8;

        return $this;
    }

    public function getProductName9(): ?string
    {
        return $this->product_name9;
    }

    public function setProductName9(string $product_name9): self
    {
        $this->product_name9 = $product_name9;

        return $this;
    }
}
