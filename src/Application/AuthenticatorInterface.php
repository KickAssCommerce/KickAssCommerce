<?php

namespace KickAss\Commerce\Application;

interface AuthenticatorInterface
{
    /**
     * @return bool
     */
    public function authenticate();
}