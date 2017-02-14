<?php

namespace KickAss\Authentication;

interface AuthenticatorInterface
{
    /**
     * @return bool
     */
    public function authenticate();
}
