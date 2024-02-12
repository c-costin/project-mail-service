<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ApplicationController extends AbstractController
{
    #[Route('/application/ajouter', name: 'app_application')]
    public function add(): Response
    {
        return $this->render(
            'application/add.html.twig',
            [
                'currentPage' => 'home'
            ]
        );
    }
}
