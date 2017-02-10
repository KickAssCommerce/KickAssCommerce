<?php

namespace App\Application;

use Moltin\SDK\Facade\Moltin as Moltin;

class Authenticator implements AuthenticatorInterface
{
    /**
     * @return bool
     * @throws \App\Exception\FailedToAuthenticateException
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
            throw new \App\Exception\FailedToAuthenticateException();
        }
        return $result;
    }
}