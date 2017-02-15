<?php

namespace KickAss\Commerce\Product;

use KickAss\Commerce\Product\Controller\Listing;
use KickAss\Commerce\Product\Controller\View;
use KickAss\Commerce\Product\Repository\Product;
use KickAss\Moltin\Bridge\Moltin\Authenticator;
use KickAss\Moltin\Bridge\Moltin\Product as BridgeProduct;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class RouterContainer
{
    public static function view()
    {
        return new View(
            new Authenticator(),
            new Product(
                new BridgeProduct(),
                new ObjectNormalizer()
            )
        );
    }

    public static function listing()
    {
        return new Listing(
            new Authenticator(),
            new Product(
                new BridgeProduct(),
                new ObjectNormalizer()
            )
        );
    }
}
