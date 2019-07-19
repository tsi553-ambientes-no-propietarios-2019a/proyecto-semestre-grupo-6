<?php

namespace App\Entity;

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
}
