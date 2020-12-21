<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $numero;

    /**
     * @ORM\OneToMany(targetEntity=Doleance::class, mappedBy="client", orphanRemoval=true)
     */
    private $doleances;

    public function __construct()
    {
        $this->doleances = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(?string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * @return Collection|Doleance[]
     */
    public function getDoleances(): Collection
    {
        return $this->doleances;
    }

    public function addDoleance(Doleance $doleance): self
    {
        if (!$this->doleances->contains($doleance)) {
            $this->doleances[] = $doleance;
            $doleance->setClient($this);
        }

        return $this;
    }

    public function removeDoleance(Doleance $doleance): self
    {
        if ($this->doleances->removeElement($doleance)) {
            // set the owning side to null (unless already changed)
            if ($doleance->getClient() === $this) {
                $doleance->setClient(null);
            }
        }

        return $this;
    }
}
