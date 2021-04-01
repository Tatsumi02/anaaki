<?php

namespace App\Entity;

use App\Repository\ContenueCoursRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContenueCoursRepository::class)
 */
class ContenueCours
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $module_id;

    /**
     * @ORM\Column(type="text")
     */
    private $introduction;

    /**
     * @ORM\Column(type="text")
     */
    private $dev;

    /**
     * @ORM\Column(type="text")
     */
    private $conclusion;

    /**
     * @ORM\Column(type="text")
     */
    private $ref;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModuleId(): ?int
    {
        return $this->module_id;
    }

    public function setModuleId(int $module_id): self
    {
        $this->module_id = $module_id;

        return $this;
    }

    public function getIntroduction(): ?string
    {
        return $this->introduction;
    }

    public function setIntroduction(string $introduction): self
    {
        $this->introduction = $introduction;

        return $this;
    }

    public function getDev(): ?string
    {
        return $this->dev;
    }

    public function setDev(string $dev): self
    {
        $this->dev = $dev;

        return $this;
    }

    public function getConclusion(): ?string
    {
        return $this->conclusion;
    }

    public function setConclusion(string $conclusion): self
    {
        $this->conclusion = $conclusion;

        return $this;
    }

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function setRef(string $ref): self
    {
        $this->ref = $ref;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }
}
