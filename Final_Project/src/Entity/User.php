<?php
// src/Entity/User.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        $this->questions = new ArrayCollection();
        $this->tries = new ArrayCollection();
        // your own logic
    }

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Questions", mappedBy="usrfk")
     */
    private $questions;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Tries", mappedBy="usrfk")
     */
    private $tries;


    /**
     * @return Collection|Questions[]
     */
    public function getQuestions(): Collection
    {
        return $this->questions;
    }

    public function addQuestion(Questions $question): self
    {
        if (!$this->questions->contains($question)) {
            $this->questions[] = $question;
            $question->setUsrfk($this);
        }

        return $this;
    }

    public function removeQuestion(Questions $question): self
    {
        if ($this->questions->contains($question)) {
            $this->questions->removeElement($question);
            // set the owning side to null (unless already changed)
            if ($question->getUsrfk() === $this) {
                $question->setUsrfk(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Tries[]
     */
    public function getTries(): Collection
    {
        return $this->tries;
    }

    public function addTry(Tries $try): self
    {
        if (!$this->tries->contains($try)) {
            $this->tries[] = $try;
            $try->setUsrfk($this);
        }

        return $this;
    }

    public function removeTry(Tries $try): self
    {
        if ($this->tries->contains($try)) {
            $this->tries->removeElement($try);
            // set the owning side to null (unless already changed)
            if ($try->getUsrfk() === $this) {
                $try->setUsrfk(null);
            }
        }

        return $this;
    }

}