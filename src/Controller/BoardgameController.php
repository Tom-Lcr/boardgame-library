<?php

namespace App\Controller;

use App\Entity\Boardgame;
use App\Form\BoardgameType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BoardgameController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/boardgames', name: 'app_boardgame')]

    public function show(EntityManagerInterface $entityManager): Response
    {
        $boardgames = $entityManager->getRepository(Boardgame::class)->findAll();

        return $this->render('boardgames/show.html.twig', [
            'boardgames' => $boardgames
        ]);
    }

    #[Route('/boardgames/new', name: 'app_boardgame_new')]
    public function new(Request $request): Response
    {
        $boardgame = new Boardgame();
        $form = $this->createForm(BoardgameType::class, $boardgame);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($boardgame);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_boardgame');
        }

        return $this->render('boardgames/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

        
    }

