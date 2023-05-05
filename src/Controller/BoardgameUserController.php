<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BoardgameUserController extends AbstractController
{
    #[Route('/boardgame/user', name: 'app_boardgame_user')]
    public function index(): Response
    {
        return $this->render('boardgame_user/index.html.twig', [
            'controller_name' => 'BoardgameUserController',
        ]);
    }
}
