<?php

namespace App\Entity;

use App\Repository\ProgressionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProgressionRepository::class)
 */
class Progression
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
    private $langage_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $partie_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $niveau_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $user_id;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPartieId(): ?int
    {
        return $this->partie_id;
    }

    public function setPartieId(int $partie_id): self
    {
        $this->partie_id = $partie_id;

        return $this;
    }

    public function getNiveauId(): ?int
    {
        return $this->niveau_id;
    }

    public function setNiveauId(int $niveau_id): self
    {
        $this->niveau_id = $niveau_id;

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
}
