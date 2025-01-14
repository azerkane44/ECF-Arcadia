<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AnimalRepository;
use App\Repository\RapportVeterinaireRepository;

class AnimalController extends AbstractController
{
    #[Route('/animaux', name: 'app_animaux')]
    public function index(AnimalRepository $animalRepository, RapportVeterinaireRepository $rapportRepository): Response
    {
        $animaux = $animalRepository->findAll();
        $rapports = $rapportRepository->findAll();

        return $this->render('pages/animal/index.html.twig', [
            'animaux' => $animaux,
            'rapports' => $rapports
        ]);
    }
}
