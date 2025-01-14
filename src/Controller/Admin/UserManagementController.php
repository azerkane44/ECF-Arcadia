<?php
// src/Controller/Admin/UserManagementController.php

namespace App\Controller\Admin;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserManagementController extends AbstractController
{
    #[Route('/test', name: 'admin_user_list')]
    public function list(EntityManagerInterface $entityManager): Response
    {
        // Récupère tous les utilisateurs
        $users = $entityManager->getRepository(User::class)->findAll();

        return $this->render('pages/admin_dashboard/user_list.html.twig', [
            'users' => $users,
        ]);
    }

    #[Route('/user/delete/{id}', name: 'admin_user_delete', methods: ['POST'])]
    public function delete(User $user, EntityManagerInterface $entityManager): Response
    {
        // Supprime l'utilisateur de la base de données
        $entityManager->remove($user);
        $entityManager->flush();

        // Ajoute un message flash pour confirmer la suppression
        $this->addFlash('success', 'Utilisateur supprimé avec succès.');

        return $this->redirectToRoute('admin_user_list');
    }
}
