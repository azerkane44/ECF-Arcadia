<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class SendEmailController extends AbstractController
{
    #[Route('/sendEmail', name: 'send_email', methods: ['POST'])]
    public function sendEmail(Request $request): Response
    {
        // Récupération des données du formulaire
        $titre = $request->request->get('titre');
        $email = $request->request->get('email');
        $message = $request->request->get('message'); // Assurez-vous que ce nom correspond au champ du formulaire

        // Traitement des données
        if (!$titre || !$email || !$message) {
            $this->addFlash('danger', 'Tous les champs sont requis.');
            return $this->redirectToRoute('contact_page'); // Redirigez vers une route existante
        }

        // Simulation de l'envoi d'un email
        $this->addFlash('success', 'Votre email a été envoyé avec succès !');

        // Retourne la vue Twig après traitement
        return $this->render('pages/contact/index.html.twig', [
            'titre' => $titre,
            'email' => $email,
            'message' => $message,
        ]);
    }
}
