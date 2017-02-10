<?php

namespace App\Application;

interface AuthenticatorInterface
{
    /**
     * @return bool
     */
    public function authenticate();
}