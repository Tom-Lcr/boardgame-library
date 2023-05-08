<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            if ($this->isGranted('ROLE_ADMIN')) {
                return $this->redirectToRoute('app_boardgame');
            }
            return $this->redirectToRoute('app_boardgame_user');
        }

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    #[Route(path: '/promote-tom-to-admin', name: 'promote_tom_to_admin')]
    public function promoteTomToAdmin(EntityManagerInterface $entityManager): Response
    {
        $userRepository = $entityManager->getRepository(User::class);
        $tom = $userRepository->findOneByEmail('tom@mail.com');

        if (!$tom) {
            throw $this->createNotFoundException('Tom not found');
        }

        $tom->setRoles(['ROLE_ADMIN']);
        $entityManager->flush();

        if ($this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('app_boardgame');
        }

        return $this->redirectToRoute('app_boardgame_user');
    }
}