<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuestionsRepository")
 */
class Questions
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $Id_Question;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Question;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $Categorie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Answer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdQuestion(): ?string
    {
        return $this->Id_Question;
    }

    public function setIdQuestion(string $Id_Question): self
    {
        $this->Id_Question = $Id_Question;

        return $this;
    }

    public function getQuestion(): ?string
    {
        return $this->Question;
    }

    public function setQuestion(string $Question): self
    {
        $this->Question = $Question;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->Categorie;
    }

    public function setCategorie(string $Categorie): self
    {
        $this->Categorie = $Categorie;

        return $this;
    }

    public function getAnswer(): ?string
    {
        return $this->Answer;
    }

    public function setAnswer(string $Answer): self
    {
        $this->Answer = $Answer;

        return $this;
    }
}
