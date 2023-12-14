<?php

namespace App\Entity;

use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

interface MyPasswordAuthenticatedUserInterface extends PasswordAuthenticatedUserInterface
{
    /**
     * @return string|null The hashed password
     */
    public function getVcpassword(): ?string;
}
