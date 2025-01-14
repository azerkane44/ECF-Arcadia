<?php

namespace App\Controller\Admin;

use App\Entity\Animal;
use App\Entity\Habitat;
use App\Entity\RapportVeterinaire;
use App\Controller\Admin\RapportVeterinaireCrudController;
use App\Entity\Image;
use App\Entity\Service;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Renderer;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('adminn/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        // Configuration du titre du dashboard
        return Dashboard::new()
            ->setTitle('Symrecipe - Administration')
            ->renderContentMaximized();
    }

    /* Ajout des entités à administrer dans la page d'administration */
    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-users', User::class);
        yield MenuItem::linkToCrud('Service', 'fas fa-concierge-bell', Service::class);
        yield MenuItem::linkToCrud('Habitat', 'fas fa-paw', Habitat::class);
        yield MenuItem::linkToCrud('Animaux', 'fas fa-dog', Animal::class);
        yield MenuItem::linkToCrud('Rapports vétérinaires', 'fas fa-stethoscope', RapportVeterinaire::class); // Ajout du lien vers l'entité RapportVeterinaire
    }
}