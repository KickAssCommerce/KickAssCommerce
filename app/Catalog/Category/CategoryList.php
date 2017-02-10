<?php

namespace App\Catalog\Category;

use Moltin\SDK\Facade\Moltin as Moltin;
use Moltin\SDK\Facade\Product as Product;

class CategoryList
{
    public function run($request, $response, $args)
    {
        // Authenticate credentials
        Moltin::Authenticate('ClientCredentials', [
            'client_id'     => getenv('MOLTIN_CLIENT_ID'),
            'client_secret' => getenv('MOLTIN_CLIENT_SECRET')
        ]);

        $product = Product::Get(1447270639613248266);

        $response->write($product['result']['sku']);

        return $response;
    }
}