<?php

namespace App\Controller;

use App\Entity\RapportVeterinaire;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RapportVeterinaireController extends AbstractController
{
    #[Route('/rapport/veterinaire', name: 'app_rapport_veterinaire')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        // Récupérer tous les rapports vétérinaires depuis la base de données
        $rapports = $entityManager->getRepository(RapportVeterinaire::class)->findAll();

        return $this->render('pages/animal/index.html.twig', [
            'rapports' => $rapports, // On passe les rapports au template
        ]);
    }
}
