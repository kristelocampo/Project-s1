<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $pseudo = null;

    #[ORM\Column]
    private array $roles = [];

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Address::class)]
    private Collection $address_id;

    #[ORM\OneToMany(mappedBy: 'user_id', targetEntity: Commentary::class)]
    private Collection $commentaries_id;

    #[ORM\OneToMany(mappedBy: 'user_id', targetEntity: Acquisition::class)]
    private Collection $annonce_id;

    public function __construct()
    {
        $this->address_id = new ArrayCollection();
        $this->commentaries_id = new ArrayCollection();
        $this->annonce_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @return Collection<int, Address>
     */
    public function getAddressId(): Collection
    {
        return $this->address_id;
    }

    public function addAddressId(Address $addressId): self
    {
        if (!$this->address_id->contains($addressId)) {
            $this->address_id->add($addressId);
            $addressId->setUser($this);
        }

        return $this;
    }

    public function removeAddressId(Address $addressId): self
    {
        if ($this->address_id->removeElement($addressId)) {
            // set the owning side to null (unless already changed)
            if ($addressId->getUser() === $this) {
                $addressId->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Commentary>
     */
    public function getCommentaries(): Collection
    {
        return $this->commentaries;
    }

    public function addCommentary(Commentary $commentary): self
    {
        if (!$this->commentaries->contains($commentary)) {
            $this->commentaries->add($commentary);
            $commentary->setUserId($this);
        }

        return $this;
    }

    public function removeCommentary(Commentary $commentary): self
    {
        if ($this->commentaries->removeElement($commentary)) {
            // set the owning side to null (unless already changed)
            if ($commentary->getUserId() === $this) {
                $commentary->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Acquisition>
     */
    public function getAnnonceId(): Collection
    {
        return $this->annonce_id;
    }

    public function addAnnonceId(Acquisition $annonceId): self
    {
        if (!$this->annonce_id->contains($annonceId)) {
            $this->annonce_id->add($annonceId);
            $annonceId->setUserId($this);
        }

        return $this;
    }

    public function removeAnnonceId(Acquisition $annonceId): self
    {
        if ($this->annonce_id->removeElement($annonceId)) {
            // set the owning side to null (unless already changed)
            if ($annonceId->getUserId() === $this) {
                $annonceId->setUserId(null);
            }
        }

        return $this;
    }
}
