<?php

namespace App\Entity;

use App\Repository\PictureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PictureRepository::class)]
class Picture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type:"integer")]
    private ?int $id = null;

    #[ORM\Column(type:"string",length: 150)]
    private ?string $namePicture = null;

    #[ORM\Column(type:"string", length: 255, nullable: true)]
    private ?string $link = null;

    #[ORM\ManyToOne(inversedBy: 'picture')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Product $product = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNamePicture(): ?string
    {
        return $this->namePicture;
    }

    public function setNamePicture(string $namePicture): self
    {
        $this->namePicture = $namePicture;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }




}
