<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SettingController extends AbstractController
{
    #[Route('/parametres', name: 'app_setting')]
    public function index(): Response
    {
        return $this->render('setting/index.html.twig',
        [
            'currentPage' => 'settings'
        ]
    );
    }
}
