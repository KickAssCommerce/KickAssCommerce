<?php

namespace KickAss\Commerce\Application;

use Moltin\SDK\Facade\Moltin as Moltin;

class Authenticator implements AuthenticatorInterface
{
    /**
     * @return bool
     * @throws \KickAss\Commerce\Exception\FailedToAuthenticateException
     */
    public function authenticate()
    {
        // Authenticate credentials
        $result = Moltin::Authenticate(
            'ClientCredentials',
            [
                'client_id'     => getenv('MOLTIN_CLIENT_ID'),
                'client_secret' => getenv('MOLTIN_CLIENT_SECRET')
            ]
        );

        if ($result === false) {
            throw new \KickAss\Commerce\Exception\FailedToAuthenticateException();
        }
        return $result;
    }
}