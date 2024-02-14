<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AccountController extends AbstractController
{
    #[Route('/compte', name: 'app_account')]
    public function index(): Response
    {
        return $this->render(
            'account/index.html.twig',
            [
                'currentPage' => 'account',
                'user' => $this->getUser(),
            ]
        );
    }

    #[Route('/compte/suppression/{id}', name: 'app_account_remove', methods: ['POST'])]
    public function remove(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        // if (!$project) {}

        // Check is CSRF Token is valid
        if ($this->isCsrfTokenValid('account_remove', $request->request->get('_csrf_token'))) {
            $entityManager->remove($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_logout');
        }
    }
}
