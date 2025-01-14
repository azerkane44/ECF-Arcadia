<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Security\SecurityAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

// ... autres namespaces et use

class RegistrationController extends AbstractController
{
    #[Route('/admin/register', name: 'app_register')]
    public function register(
        Request $request,
        UserPasswordHasherInterface $userPasswordHasher,
        EntityManagerInterface $entityManager,
        AuthorizationCheckerInterface $authorizationChecker
    ): Response {
        // Vérifie si l'utilisateur n'est pas un administrateur
        if (!$authorizationChecker->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('acceuil');
        }

        // Si l'utilisateur est un administrateur, il peut accéder au formulaire d'inscription
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $plainPassword = $form->get('plainPassword')->getData();
            $user->setPassword($userPasswordHasher->hashPassword($user, $plainPassword));

            // Ajout des rôles uniquement pour l'administrateur
            $roles = $form->get('roles')->getData();
            $user->setRoles($roles);

            // Sauvegarde du nouvel utilisateur
            $entityManager->persist($user);
            $entityManager->flush();

            // Affiche un message de succès
            $this->addFlash('success', 'Le compte a été créé avec succès !');

            // Redirection vers la page de gestion ou reste sur le formulaire, selon vos besoins
            return $this->redirectToRoute('app_register');
        }

        return $this->render('pages/register.html.twig', [
            'registrationForm' => $form,
        ]);
    }
}
