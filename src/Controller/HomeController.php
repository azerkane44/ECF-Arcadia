<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Doctrine\ORM\Query\Expr\Select;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function accueil(): Response
    {
        $Admin = ["ROLE_ADMIN", "ROLE_VETERINAIRE", "ROLE_EMPLOYE", "ROLE_USER"];
        $veterinaire = ["ROLE_VETERINAIRE", "ROLE_USER"];
        $employe = ["ROLE_EMPLOYE", "ROLE_USER"];
        $user = [];





        return $this->render('pages/acceuil.html.twig');
    }
}
