<?php

namespace App\Controller;

use ApiPlatform\Api\IriConverterInterface;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

class SecurityController extends AbstractController
{

    #[Route('/login', name: 'app_login', methods: ['POST'])]
    public function login(IriConverterInterface $iriConverter, #[CurrentUser] User $user = null): Response
    {
        if(!$user){
            return $this->json([
                'error' => "Invalid login request: Content-type isnt't a JSON"
            ], 401);
        }

//        return $this->json([
////            'user' => $user->getId(),
////            'username' => $user->getUsername(),
//            'location' => $iriConverter->getIriFromResource($user),
//        ]);
        // TODO preguntar porque con x-location o location no me esta enviando el parametro que le estoy definiendo pero porque con link si
        return new Response(null, 204, [
//            'X-Location' => $iriConverter->getIriFromResource($user),
//            'Location' => $iriConverter->getIriFromResource($user),
            'Link' => $iriConverter->getIriFromResource($user),
        ]);
    }


    #[Route('/logout', name: 'app_logout')]
    public function logout(): void{
        throw new \Exception('This should never be reached');
    }
}
