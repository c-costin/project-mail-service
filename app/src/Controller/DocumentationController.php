<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DocumentationController extends AbstractController
{
    #[Route('/documentation', name: 'app_documentation')]
    public function documentation(): Response
    {
        return $this->render(
            'documentation/index.html.twig',
            [
                'currentPage' => 'documentation'
            ]
        );
    }
}
