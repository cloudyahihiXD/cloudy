<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeRepository::class)
 */
class Type
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=70)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=Candy::class, mappedBy="type")
     */
    private $candies;

    public function __construct()
    {
        $this->candies = new ArrayCollection();
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

    /**
     * @return Collection|Candy[]
     */
    public function getCandy(): Collection
    {
        return $this->candies;
    }

    public function addCandy(Candy $candy): self
    {
        if (!$this->candies->contains($candy)) {
            $this->candies[] = $candy;
            $candy->addType($this);
        }

        return $this;
    }

    public function removeCandy(Candy $candy): self
    {
        if ($this->candies->removeElement($candy)) {
            $candy->removeType($this);
        }

        return $this;
    }
}
