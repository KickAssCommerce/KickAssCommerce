<?php

namespace KickAss\Moltin\Bridge\Moltin;

use Moltin\SDK\Facade\Moltin as Moltin;

use KickAss\Authentication\Exception\FailedToAuthenticateException;
use KickAss\Authentication\AuthenticatorInterface;

class Authenticator implements AuthenticatorInterface
{
    /**
     * @return bool
     * @throws FailedToAuthenticateException
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
            throw new FailedToAuthenticateException();
        }
        return $result;
    }
}
