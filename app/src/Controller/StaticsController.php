<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class StaticsController extends AbstractController
{
    #[Route('/statisques', name: 'app_statics')]
    public function index(): Response
    {
        return $this->render('statics/index.html.twig',
        [
            'currentPage' => 'statics'
        ]
    );
    }
}
