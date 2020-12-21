<?php

namespace App\Entity;

use App\Repository\DoleanceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DoleanceRepository::class)
 */
class Doleance
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $plainte;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="doleances")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlainte(): ?string
    {
        return $this->plainte;
    }

    public function setPlainte(?string $plainte): self
    {
        $this->plainte = $plainte;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }
}
