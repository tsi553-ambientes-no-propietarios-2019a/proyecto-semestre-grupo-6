<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ControlRepository")
 */
class Control
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
    private $answer;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Questions", inversedBy="controls")
     * @ORM\JoinColumn(nullable=false)
     */
    private $questionsfk;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Tries", inversedBy="controls")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tryfk;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnswer(): ?string
    {
        return $this->answer;
    }

    public function setAnswer(string $answer): self
    {
        $this->answer = $answer;

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

    public function getTryfk(): ?Tries
    {
        return $this->tryfk;
    }

    public function setTryfk(?Tries $tryfk): self
    {
        $this->tryfk = $tryfk;

        return $this;
    }
}
