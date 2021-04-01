<?php

namespace App\Entity;

use App\Repository\CompteursRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompteursRepository::class)
 */
class Compteurs
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
    private $contenu_exo_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $duree;

    /**
     * @ORM\Column(type="integer")
     */
    private $temps_notification;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContenuExoId(): ?int
    {
        return $this->contenu_exo_id;
    }

    public function setContenuExoId(int $contenu_exo_id): self
    {
        $this->contenu_exo_id = $contenu_exo_id;

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

    public function getTempsNotification(): ?int
    {
        return $this->temps_notification;
    }

    public function setTempsNotification(int $temps_notification): self
    {
        $this->temps_notification = $temps_notification;

        return $this;
    }
}
