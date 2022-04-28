<?php

namespace App\Entity;

use App\Repository\EmprunterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmprunterRepository::class)]
class Emprunter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'integer')]
    private $books_number;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getBooksNumber(): ?int
    {
        return $this->books_number;
    }

    public function setBooksNumber(int $books_number): self
    {
        $this->books_number = $books_number;

        return $this;
    }
}
