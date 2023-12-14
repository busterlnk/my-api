<?php

namespace App\Controller;

use App\Entity\Chatoperator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

class SecurityController extends AbstractController
{

    #[Route('/login', name: 'app_login', methods: ['POST'])]
    public function login(#[CurrentUser] Chatoperator $chatoperator = null): Response
    {
        return $this->json([
           'chatoperator' => $chatoperator ? $chatoperator->getOperatorid() : null,
        ]);
    }
}
