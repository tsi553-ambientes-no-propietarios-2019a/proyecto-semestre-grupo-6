<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\QuestionsRepository;
use App\Entity\Questions;
use App\Form\QuestionsType;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/simulador")
 */
class SimuladorController extends AbstractController
{
    /**
     * @Route("/simulador", name="simulador_index")
     *
     * @IsGranted("ROLE_USER")
     */
    public function index()
    {
        return $this->render('simulador/index.html.twig', [
            'controller_name' => 'SimuladorController',
        ]);
    }
    /**
     * @Route("/{id}", name="simulador_show", methods={"GET","POST"})
     * @IsGranted("ROLE_USER")
     */
    public function show(Questions $question): Response
    {
        return $this->render('simulador/show.html.twig', [
            'question' => $question,
        ]);
    }
}
