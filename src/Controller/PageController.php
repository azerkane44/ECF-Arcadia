<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    #[Route('/', name: 'acceuil')]
    public function acceuil(): Response
    {
        return $this->render('pages/acceuil/acceuil.html.twig');
    }


    # #[Route('/admin/dashboard', name: 'app_admin_dashboard')]
    # public function admin(): Response
    # {
    #     return $this->render('pages/admin_dashboard/administration_page.html.twig');
    # }



    # #[Route('/contact', name: 'contact')]
    #public function contact(): Response
    # {
    #     return $this->render('pages/contact.html.twig');
    # }




    #[Route('/services', name: 'service_list')]
    public function service(): Response
    {
        return $this->render('pages/service/index.html.twig');
    }
}
