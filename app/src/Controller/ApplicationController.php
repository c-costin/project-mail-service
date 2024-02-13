<?php

namespace App\Controller;

use App\Entity\Project;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ApplicationController extends AbstractController
{
    #[Route('/application/ajouter', name: 'app_application_add', methods: ['GET', 'POST'])]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $appKey = bin2hex(random_bytes(16));
        $secretKey = bin2hex(random_bytes(32));

        if ($request->getMethod() === "POST") {

            // Check is CSRF Token is valid
            if ($this->isCsrfTokenValid('application_add', $request->request->get('_csrf_token'))) {

                $project = new Project();
                $project->setName($request->request->get('name'));
                $project->setDomain($request->request->get('domain'));
                $project->setProjectKey($request->request->get('appKey'));
                $project->setSecretKey($request->request->get('secretKey'));
                $project->setUser($this->getUser());

                $entityManager->persist($project);
                $entityManager->flush();

                return $this->redirectToRoute('app_default');
            }
        }

        return $this->render(
            'application/add.html.twig',
            [
                'currentPage' => 'home',
                'currentAction' => 'add',
                'appKey' => $appKey,
                'secretKey' => $secretKey,
            ]
        );
    }

    #[Route('/application/editer/{id}', name: 'app_application_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Project $project, EntityManagerInterface $entityManager): Response
    {
        // if (!$project) {}

        if ($request->getMethod() === "POST") {

            // Check is CSRF Token is valid
            if ($this->isCsrfTokenValid('application_edit', $request->request->get('_csrf_token'))) {

                if ($project->getName() !== $request->request->get('name')) {$project->setName($request->request->get('name'));}
                if ($project->getDomain() !== $request->request->get('domain')) {$project->setDomain($request->request->get('domain'));}
                if ($project->getProjectKey() !== $request->request->get('appKey')) {$project->setProjectKey($request->request->get('appKey'));}
                if ($project->getSecretKey() !== $request->request->get('secretKey')) {$project->setSecretKey($request->request->get('secretKey'));}

                $project->setUpdatedAt(new DateTimeImmutable());

                $entityManager->persist($project);
                $entityManager->flush();

                return $this->redirectToRoute('app_default');
            }
        }

        return $this->render(
            'application/edit.html.twig',
            [
                'currentPage' => 'home',
                'currentAction' => 'edit',
                'project' => $project,
            ]
        );
    }

    #[Route('/application/supprimer/{id}', name: 'app_application_remove', methods: ['POST'])]
    public function remove(Request $request, Project $project, EntityManagerInterface $entityManager): Response
    {
        // if (!$project) {}

        // Check is CSRF Token is valid
        if ($this->isCsrfTokenValid('application_remove', $request->request->get('_csrf_token'))) {
            $entityManager->remove($project);
            $entityManager->flush();

            return $this->redirectToRoute('app_default');
        }
    }
}
