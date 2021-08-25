<?php

namespace App\Entity;

use App\Repository\CandyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CandyRepository::class)
 */
class Candy
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $images;

    /**
     * @ORM\Column(type="float")
     */
    private $prices;

    /**
     * @ORM\ManyToMany(targetEntity=Type::class, inversedBy="candies")
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $ShelfLife;

    /**
     * @ORM\Column(type="text")
     */
    private $detail;

    
    public function __construct()
    {
        $this->type = new ArrayCollection();
    }

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

    public function getImages(): ?bool
    {
        return $this->images;
    }

    public function setImages(bool $images): self
    {
        $this->images = $images;

        return $this;
    }

    public function getPrices(): ?float
    {
        return $this->prices;
    }

    public function setPrices(float $prices): self
    {
        $this->prices = $prices;

        return $this;
    }

    /**
     * @return Collection|type[]
     */
    public function getType(): Collection
    {
        return $this->type;
    }

    public function addType(type $type): self
    {
        if (!$this->type->contains($type)) {
            $this->type[] = $type;
        }

        return $this;
    }

    public function removeType(type $type): self
    {
        $this->type->removeElement($type);

        return $this;
    }

    public function getShelfLife(): ?string
    {
        return $this->ShelfLife;
    }

    public function setShelfLife(string $ShelfLife): self
    {
        $this->ShelfLife = $ShelfLife;

        return $this;
    }

    public function getDetail(): ?string
    {
        return $this->detail;
    }

    public function setDetail(string $detail): self
    {
        $this->detail = $detail;

        return $this;
    }
}
