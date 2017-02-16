<?php

namespace KickAss\Moltin\Bridge\Moltin;

use Moltin\Client as MoltinClient;

trait Client
{
    /**
     * @var \Moltin\Client $client
     */
    protected $client;

    /**
     * @return \Moltin\Client
     */
    public function getClient()
    {
        return $this->client ??
            $this->client = new MoltinClient([
                'client_id' => getenv('MOLTIN_CLIENT_ID'),
                'client_secret' => getenv('MOLTIN_CLIENT_SECRET'),
                'currency_code' => getenv('MOLTIN_CURRENCY_CODE'),
                'language' => getenv('MOLTIN_LANGUAGE'),
                'locale' => getenv('MOLTIN_LOCALE')
            ]);
    }
}
