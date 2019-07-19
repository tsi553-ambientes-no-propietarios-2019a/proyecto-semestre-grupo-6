<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TriesRepository")
 */
class Tries
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="integer")
     */
    private $total_score;

    /**
     * @ORM\Column(type="integer")
     */
    private $w_score;

    /**
     * @ORM\Column(type="integer")
     */
    private $r_score;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Control", mappedBy="tryfk")
     */
    private $controls;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="tries")
     * @ORM\JoinColumn(nullable=false)
     */
    private $usrfk;

    public function __construct()
    {
        $this->controls = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTotalScore(): ?int
    {
        return $this->total_score;
    }

    public function setTotalScore(int $total_score): self
    {
        $this->total_score = $total_score;

        return $this;
    }

    public function getWScore(): ?int
    {
        return $this->w_score;
    }

    public function setWScore(int $w_score): self
    {
        $this->w_score = $w_score;

        return $this;
    }

    public function getRScore(): ?int
    {
        return $this->r_score;
    }

    public function setRScore(int $r_score): self
    {
        $this->r_score = $r_score;

        return $this;
    }

    /**
     * @return Collection|Control[]
     */
    public function getControls(): Collection
    {
        return $this->controls;
    }

    public function addControl(Control $control): self
    {
        if (!$this->controls->contains($control)) {
            $this->controls[] = $control;
            $control->setTryfk($this);
        }

        return $this;
    }

    public function removeControl(Control $control): self
    {
        if ($this->controls->contains($control)) {
            $this->controls->removeElement($control);
            // set the owning side to null (unless already changed)
            if ($control->getTryfk() === $this) {
                $control->setTryfk(null);
            }
        }

        return $this;
    }

    public function getUsrfk(): ?User
    {
        return $this->usrfk;
    }

    public function setUsrfk(?User $usrfk): self
    {
        $this->usrfk = $usrfk;

        return $this;
    }
}
