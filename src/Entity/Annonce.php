<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnnonceRepository::class)]
class Annonce
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?string $price = null;


    #[ORM\OneToMany(mappedBy: 'annonce_id', targetEntity: Commentary::class)]
    private Collection $user_id;

    #[ORM\Column(nullable: true)]
    private ?bool $is_visible = null;

    public function __construct()
    {
        $this->user_id = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection<int, Commentary>
     */
    public function getUserId(): Collection
    {
        return $this->user_id;
    }

    public function addUserId(Commentary $userId): self
    {
        if (!$this->user_id->contains($userId)) {
            $this->user_id->add($userId);
            $userId->setAnnonceId($this);
        }

        return $this;
    }

    public function removeUserId(Commentary $userId): self
    {
        if ($this->user_id->removeElement($userId)) {
            // set the owning side to null (unless already changed)
            if ($userId->getAnnonceId() === $this) {
                $userId->setAnnonceId(null);
            }
        }

        return $this;
    }

    public function isIsVisible(): ?bool
    {
        return $this->is_visible;
    }

    public function setIsVisible(?bool $is_visible): self
    {
        $this->is_visible = $is_visible;

        return $this;
    }
}
