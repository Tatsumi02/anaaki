<?php

namespace App\Entity;

use App\Repository\ContenueExoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContenueExoRepository::class)
 */
class ContenueExo
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
     * @ORM\Column(type="string", length=255)
     */
    private $exo1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rep1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $exo2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rep2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $exo3;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rep3;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $exo4;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rep4;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $exo5;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rep5;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $exo6;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rep6;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $exo7;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rep7;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $exo8;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rep8;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $exo9;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rep9;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $exo10;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rep10;

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

    public function getExo1(): ?string
    {
        return $this->exo1;
    }

    public function setExo1(string $exo1): self
    {
        $this->exo1 = $exo1;

        return $this;
    }

    public function getRep1(): ?string
    {
        return $this->rep1;
    }

    public function setRep1(string $rep1): self
    {
        $this->rep1 = $rep1;

        return $this;
    }

    public function getExo2(): ?string
    {
        return $this->exo2;
    }

    public function setExo2(string $exo2): self
    {
        $this->exo2 = $exo2;

        return $this;
    }

    public function getRep2(): ?string
    {
        return $this->rep2;
    }

    public function setRep2(string $rep2): self
    {
        $this->rep2 = $rep2;

        return $this;
    }

    public function getExo3(): ?string
    {
        return $this->exo3;
    }

    public function setExo3(string $exo3): self
    {
        $this->exo3 = $exo3;

        return $this;
    }

    public function getRep3(): ?string
    {
        return $this->rep3;
    }

    public function setRep3(string $rep3): self
    {
        $this->rep3 = $rep3;

        return $this;
    }

    public function getExo4(): ?string
    {
        return $this->exo4;
    }

    public function setExo4(string $exo4): self
    {
        $this->exo4 = $exo4;

        return $this;
    }

    public function getRep4(): ?string
    {
        return $this->rep4;
    }

    public function setRep4(string $rep4): self
    {
        $this->rep4 = $rep4;

        return $this;
    }

    public function getExo5(): ?string
    {
        return $this->exo5;
    }

    public function setExo5(string $exo5): self
    {
        $this->exo5 = $exo5;

        return $this;
    }

    public function getRep5(): ?string
    {
        return $this->rep5;
    }

    public function setRep5(string $rep5): self
    {
        $this->rep5 = $rep5;

        return $this;
    }

    public function getExo6(): ?string
    {
        return $this->exo6;
    }

    public function setExo6(string $exo6): self
    {
        $this->exo6 = $exo6;

        return $this;
    }

    public function getRep6(): ?string
    {
        return $this->rep6;
    }

    public function setRep6(string $rep6): self
    {
        $this->rep6 = $rep6;

        return $this;
    }

    public function getExo7(): ?string
    {
        return $this->exo7;
    }

    public function setExo7(string $exo7): self
    {
        $this->exo7 = $exo7;

        return $this;
    }

    public function getRep7(): ?string
    {
        return $this->rep7;
    }

    public function setRep7(string $rep7): self
    {
        $this->rep7 = $rep7;

        return $this;
    }

    public function getExo8(): ?string
    {
        return $this->exo8;
    }

    public function setExo8(string $exo8): self
    {
        $this->exo8 = $exo8;

        return $this;
    }

    public function getRep8(): ?string
    {
        return $this->rep8;
    }

    public function setRep8(string $rep8): self
    {
        $this->rep8 = $rep8;

        return $this;
    }

    public function getExo9(): ?string
    {
        return $this->exo9;
    }

    public function setExo9(string $exo9): self
    {
        $this->exo9 = $exo9;

        return $this;
    }

    public function getRep9(): ?string
    {
        return $this->rep9;
    }

    public function setRep9(string $rep9): self
    {
        $this->rep9 = $rep9;

        return $this;
    }

    public function getExo10(): ?string
    {
        return $this->exo10;
    }

    public function setExo10(string $exo10): self
    {
        $this->exo10 = $exo10;

        return $this;
    }

    public function getRep10(): ?string
    {
        return $this->rep10;
    }

    public function setRep10(string $rep10): self
    {
        $this->rep10 = $rep10;

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
