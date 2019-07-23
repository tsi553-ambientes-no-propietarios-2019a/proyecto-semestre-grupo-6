<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OptionsRepository")
 */
class Options
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
    private $option1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $option2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $option3;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Questions", inversedBy="options")
     * @ORM\JoinColumn(nullable=false)
     */
    private $questionsfk;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIDOption(): ?string
    {
        return $this->ID_option;
    }

    public function setIDOption(string $ID_option): self
    {
        $this->ID_option = $ID_option;

        return $this;
    }

    public function getOption1(): ?string
    {
        return $this->option1;
    }

    public function setOption1(string $option1): self
    {
        $this->option1 = $option1;

        return $this;
    }

    public function getOption2(): ?string
    {
        return $this->option2;
    }

    public function setOption2(string $option2): self
    {
        $this->option2 = $option2;

        return $this;
    }

    public function getOption3(): ?string
    {
        return $this->option3;
    }

    public function setOption3(string $option3): self
    {
        $this->option3 = $option3;

        return $this;
    }

    public function getQuestionsfk(): ?Questions
    {
        return $this->questionsfk;
    }

    public function setQuestionsfk(?Questions $questionsfk): self
    {
        $this->questionsfk = $questionsfk;

        return $this;
    }
}
