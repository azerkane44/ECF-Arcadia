<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils, AuthorizationCheckerInterface $authorizationChecker): Response
    {
        // Si l'utilisateur est déjà connecté
        if ($this->getUser()) {
            // Vérifie si l'utilisateur connecté est un administrateur
            if ($authorizationChecker->isGranted('ROLE_ADMIN')) {
                // Redirige vers le tableau de bord de l'administrateur
                return $this->redirectToRoute('admin');
            }
            // Si ce n'est pas un administrateur, redirige vers la page d'accueil
            return $this->redirectToRoute('acceuil');
        }

        // Récupère l'erreur de connexion, si elle existe
        $error = $authenticationUtils->getLastAuthenticationError();
        // Récupère le dernier nom d'utilisateur saisi
        $lastUsername = $authenticationUtils->getLastUsername();

        // Retourne la vue avec les informations de connexion
        return $this->render('pages/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        // Cette méthode peut rester vide car elle sera interceptée par Symfony
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
