<?php
// src/Controller/ServiceController.php

namespace App\Controller;

use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ServiceController extends AbstractController
{
    #[Route('/service', name: 'service_list')]
    public function index(ServiceRepository $serviceRepository): Response
    {
        // Récupérer tous les services de la base de données
        $services = $serviceRepository->findAll();

        // Passer les services à la vue
        return $this->render('pages/service/index.html.twig', [
            'services' => $services,
        ]);
    }
}
