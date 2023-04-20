<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemRepository::class)]
class Item
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'items')]
    private ?Boardgame $boardgame = null;

    #[ORM\Column]
    private ?bool $present = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBoardgame(): ?Boardgame
    {
        return $this->boardgame;
    }

    public function setBoardgame(?Boardgame $boardgame): self
    {
        $this->boardgame = $boardgame;

        return $this;
    }

    public function isPresent(): ?bool
    {
        return $this->present;
    }

    public function setPresent(bool $present): self
    {
        $this->present = $present;

        return $this;
    }
}
