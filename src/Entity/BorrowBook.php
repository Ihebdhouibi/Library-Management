<?php

namespace App\Entity;

use App\Repository\BorrowBookRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BorrowBookRepository::class)]
class BorrowBook
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $BorrowDate;

    #[ORM\Column(type: 'string', length: 255)]
    private $action;

    #[ORM\Column(type: 'boolean')]
    private $approved;

    #[ORM\Column(type: 'datetime')]
    private $DeleteDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBorrowDate(): ?\DateTimeInterface
    {
        return $this->BorrowDate;
    }

    public function setBorrowDate(\DateTimeInterface $BorrowDate): self
    {
        $this->BorrowDate = $BorrowDate;

        return $this;
    }

    public function getAction(): ?string
    {
        return $this->action;
    }

    public function setAction(string $action): self
    {
        $this->action = $action;

        return $this;
    }

    public function getApproved(): ?bool
    {
        return $this->approved;
    }

    public function setApproved(bool $approved): self
    {
        $this->approved = $approved;

        return $this;
    }

    public function getDeleteDate(): ?\DateTimeInterface
    {
        return $this->DeleteDate;
    }

    public function setDeleteDate(\DateTimeInterface $DeleteDate): self
    {
        $this->DeleteDate = $DeleteDate;

        return $this;
    }
}
