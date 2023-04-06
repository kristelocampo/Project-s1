<?php

namespace App\Entity;

use App\Repository\AcquisitionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AcquisitionRepository::class)]
class Acquisition
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'annonce_id')]
    private ?User $user_id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Annonce $annonce_id = null;

    #[ORM\ManyToOne(inversedBy: 'acquisitions')]
    private ?Address $address_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(?User $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getAnnonceId(): ?Annonce
    {
        return $this->annonce_id;
    }

    public function setAnnonceId(?Annonce $annonce_id): self
    {
        $this->annonce_id = $annonce_id;

        return $this;
    }

    public function getAddressId(): ?Address
    {
        return $this->address_id;
    }

    public function setAddressId(?Address $address_id): self
    {
        $this->address_id = $address_id;

        return $this;
    }
}
