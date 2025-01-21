<?php
namespace App\Controller;

use App\Document\Avis;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function accueil(DocumentManager $dm): Response
    {
        // Définitions des rôles
        $Admin = ["ROLE_ADMIN", "ROLE_VETERINAIRE", "ROLE_EMPLOYE", "ROLE_USER"];
        $veterinaire = ["ROLE_VETERINAIRE", "ROLE_USER"];
        $employe = ["ROLE_EMPLOYE", "ROLE_USER"];
        $user = [];

        // Récupération des avis depuis la base MongoDB
        $avisList = $dm->getRepository(Avis::class)->findAll();

        return $this->render('pages/acceuil.html.twig', [
            'avisList' => $avisList,
        ]);
    }
}
