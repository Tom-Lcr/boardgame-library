<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BoardgameAdminController extends AbstractController
{
    #[Route('/boardgame/admin', name: 'app_boardgame_admin')]
    public function index(): Response
    {
        return $this->render('boardgame_admin/index.html.twig', [
            'controller_name' => 'BoardgameAdminController',
        ]);
    }
}
