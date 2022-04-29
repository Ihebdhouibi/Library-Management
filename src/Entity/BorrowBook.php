<?php

namespace App\Entity;

use App\Repository\BorrowBookRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\ManyToMany(targetEntity: Emprunter::class)]
    private $id_emp;

    #[ORM\ManyToMany(targetEntity: Book::class)]
    private $id_book;

    public function __construct()
    {
        $this->id_emp = new ArrayCollection();
        $this->id_book = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Emprunter>
     */
    public function getIdEmp(): Collection
    {
        return $this->id_emp;
    }

    public function addIdEmp(Emprunter $idEmp): self
    {
        if (!$this->id_emp->contains($idEmp)) {
            $this->id_emp[] = $idEmp;
        }

        return $this;
    }

    public function removeIdEmp(Emprunter $idEmp): self
    {
        $this->id_emp->removeElement($idEmp);

        return $this;
    }

    /**
     * @return Collection<int, Book>
     */
    public function getIdBook(): Collection
    {
        return $this->id_book;
    }

    public function addIdBook(Book $idBook): self
    {
        if (!$this->id_book->contains($idBook)) {
            $this->id_book[] = $idBook;
        }

        return $this;
    }

    public function removeIdBook(Book $idBook): self
    {
        $this->id_book->removeElement($idBook);

        return $this;
    }
}
