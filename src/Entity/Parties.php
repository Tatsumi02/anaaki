<?php

namespace App\Entity;

use App\Repository\PartiesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PartiesRepository::class)
 */
class Parties
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="text")
     */
    private $descrition;

    /**
     * @ORM\Column(type="integer")
     */
    private $exo1_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $exo2_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $exo3_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $exo4_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $exo5_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $user_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $duree;

    /**
     * @ORM\Column(type="integer")
     */
    private $langage_id;

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

    public function getDescrition(): ?string
    {
        return $this->descrition;
    }

    public function setDescrition(string $descrition): self
    {
        $this->descrition = $descrition;

        return $this;
    }

    public function getExo1Id(): ?int
    {
        return $this->exo1_id;
    }

    public function setExo1Id(int $exo1_id): self
    {
        $this->exo1_id = $exo1_id;

        return $this;
    }

    public function getExo2Id(): ?int
    {
        return $this->exo2_id;
    }

    public function setExo2Id(int $exo2_id): self
    {
        $this->exo2_id = $exo2_id;

        return $this;
    }

    public function getExo3Id(): ?int
    {
        return $this->exo3_id;
    }

    public function setExo3Id(int $exo3_id): self
    {
        $this->exo3_id = $exo3_id;

        return $this;
    }

    public function getExo4Id(): ?int
    {
        return $this->exo4_id;
    }

    public function setExo4Id(int $exo4_id): self
    {
        $this->exo4_id = $exo4_id;

        return $this;
    }

    public function getExo5Id(): ?int
    {
        return $this->exo5_id;
    }

    public function setExo5Id(int $exo5_id): self
    {
        $this->exo5_id = $exo5_id;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getLangageId(): ?int
    {
        return $this->langage_id;
    }

    public function setLangageId(int $langage_id): self
    {
        $this->langage_id = $langage_id;

        return $this;
    }
}
