<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/', name: 'app_default')]
    public function index(): Response
    {
        return $this->render('dashboard/index.html.twig',
            []
        );
    }

    #[Route('/applications', name: 'app_applications')]
    public function applications(): Response
    {
        return $this->render('dashboard/applications.html.twig');
    }

    #[Route('/documentation', name: 'app_documentation')]
    public function documentation(): Response
    {
        return $this->render('dashboard/documentation.html.twig');
    }
}
