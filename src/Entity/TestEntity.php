<?php

namespace App\Entity;

use App\Repository\TestEntityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TestEntityRepository::class)]
class TestEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $testText = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTestText(): ?string
    {
        return $this->testText;
    }

    public function setTestText(string $testText): self
    {
        $this->testText = $testText;

        return $this;
    }
}
