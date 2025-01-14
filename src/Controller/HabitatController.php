<?php

namespace App\Controller;

use App\Entity\Habitat;
use App\Repository\HabitatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HabitatController extends AbstractController
{
    #[Route('/habitat', name: 'app_habitats')]
    public function index(HabitatRepository $habitatRepository): Response
    {
        // Récupérer tous les habitats
        $habitats = $habitatRepository->findAll();

        return $this->render('pages/habitat/index.html.twig', [
            'habitats' => $habitats,
        ]);
    }
}
