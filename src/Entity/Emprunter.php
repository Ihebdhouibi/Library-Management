<?php

namespace App\Entity;

use App\Repository\EmprunterRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\LibraryUser;
#[ORM\Entity(repositoryClass: EmprunterRepository::class)]

class Emprunter extends LibraryUser
{

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'integer')]
    private $books_number;

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
