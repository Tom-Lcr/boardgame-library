<?php

namespace App\Controller;

use App\Entity\Item;
use App\Form\ItemType;
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

    #[Route('/boardgames/edit/{id}', name: 'app_boardgame_edit', methods: ['GET', 'POST'])]
    public function edit(Boardgame $boardgame, Request $request): Response
    {
        $form = $this->createForm(BoardgameType::class, $boardgame);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            return $this->redirectToRoute('app_boardgame');
        }

        return $this->render('boardgames/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/boardgames/delete/{id}', name: 'app_boardgame_delete', methods: ['POST', 'DELETE'])]
    public function delete(Request $request, Boardgame $boardgame): Response
    {
        if ($this->isCsrfTokenValid('delete'.$boardgame->getId(), $request->request->get('_token'))) {
            $this->entityManager->remove($boardgame);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('app_boardgame');
    }

    #[Route('/boardgames/items/new/{id}', name: 'app_boardgame_item_new')]
    public function newItem(Boardgame $boardgame, Request $request): Response
    {
        $item = new Item();
        $item->setBoardgame($boardgame);
        $form = $this->createForm(ItemType::class, $item);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($item);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_boardgame');
        }

        return $this->render('boardgames/item_new.html.twig', [
            'boardgame' => $boardgame,
            'form' => $form->createView(), 
        ]);
    }
        
    }

