<?php

namespace App\Catalog\Category;

use Moltin\SDK\Facade\Moltin as Moltin;
use Moltin\SDK\Facade\Product as Product;

class CategoryList
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;

    public function __invoke(
        \Psr\Http\Message\ServerRequestInterface $request,
        \Psr\Http\Message\ResponseInterface $response
    ) {
        $this->response = $response;

        // Authenticate credentials
        Moltin::Authenticate('ClientCredentials', [
            'client_id'     => getenv('MOLTIN_CLIENT_ID'),
            'client_secret' => getenv('MOLTIN_CLIENT_SECRET')
        ]);

        $products = Product::Listing();

        if (!empty($products)) {
            $this->response->write(
                sprintf(
                    'We have %d product(s)!',
                    count($products['result'])
                )
            );

            array_walk(
                $products['result'],
                [$this, 'displayProductDetails']
            );
        }

        return $this->response;
    }

    private function displayProductDetails($product, $key)
    {
        $this->response->write('<br />');
        $this->response->write('ProductNumber: ' . $key . '<br />');
        $this->response->write(
            sprintf(
                'Sku: %s',
                $product['sku']
            )
        );
    }
}