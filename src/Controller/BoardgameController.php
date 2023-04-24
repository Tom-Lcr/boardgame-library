<?php

namespace App\Controller;

use App\Entity\Boardgame;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;

class BoardgameController extends AbstractController
{
    private $entityManager;

    #[Route('/boardgames', name: 'boardgames')]

    public function show(EntityManagerInterface $entityManager): Response
    {
        $boardgames = $entityManager->getRepository(Boardgame::class)->findAll();

        return $this->render('boardgames/show.html.twig', [
            'boardgames' => $boardgames
        ]);
    }

        
    }

