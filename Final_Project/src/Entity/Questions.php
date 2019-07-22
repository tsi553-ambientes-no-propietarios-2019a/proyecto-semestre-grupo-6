<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="questions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $usrfk;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Options", mappedBy="questionsfk")
     */
    private $options;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Control", mappedBy="questionsfk")
     */
    private $controls;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Option1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Option2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Option3;

    public function __construct()
    {
        $this->options = new ArrayCollection();
        $this->controls = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getUsrfk(): ?User
    {
        return $this->usrfk;
    }

    public function setUsrfk(?User $usrfk): self
    {
        $this->usrfk = $usrfk;

        return $this;
    }

    /**
     * @return Collection|Options[]
     */
    public function getOptions(): Collection
    {
        return $this->options;
    }

    public function addOption(Options $option): self
    {
        if (!$this->options->contains($option)) {
            $this->options[] = $option;
            $option->setQuestionsfk($this);
        }

        return $this;
    }

    public function removeOption(Options $option): self
    {
        if ($this->options->contains($option)) {
            $this->options->removeElement($option);
            // set the owning side to null (unless already changed)
            if ($option->getQuestionsfk() === $this) {
                $option->setQuestionsfk(null);
            }
        }

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
            $control->setQuestionsfk($this);
        }

        return $this;
    }

    public function removeControl(Control $control): self
    {
        if ($this->controls->contains($control)) {
            $this->controls->removeElement($control);
            // set the owning side to null (unless already changed)
            if ($control->getQuestionsfk() === $this) {
                $control->setQuestionsfk(null);
            }
        }

        return $this;
    }

    public function getOption1(): ?string
    {
        return $this->Option1;
    }

    public function setOption1(string $Option1): self
    {
        $this->Option1 = $Option1;

        return $this;
    }

    public function getOption2(): ?string
    {
        return $this->Option2;
    }

    public function setOption2(string $Option2): self
    {
        $this->Option2 = $Option2;

        return $this;
    }

    public function getOption3(): ?string
    {
        return $this->Option3;
    }

    public function setOption3(string $Option3): self
    {
        $this->Option3 = $Option3;

        return $this;
    }
}
