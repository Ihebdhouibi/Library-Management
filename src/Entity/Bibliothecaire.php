<?php

namespace App\Entity;

use App\Repository\BibliothecaireRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\LibraryUser ;

#[ORM\Entity(repositoryClass: BibliothecaireRepository::class)]
class Bibliothecaire extends LibraryUser
{

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }
}
