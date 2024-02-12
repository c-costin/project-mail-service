<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_default')]
    public function index(ProjectRepository $projectRepository): Response
    {
        // Find all projects by User ID
        $apps = $projectRepository->findAllProjectsByUserId($this->getUser()->getId());

        return $this->render(
            'home/index.html.twig',
            [
                'currentPage' => 'home',
                'apps' => $apps
            ]
        );
    }
}
