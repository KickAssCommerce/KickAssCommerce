<?php

namespace KickAss\Commerce\Product;

class RouterContainer
{
    public static function view()
    {
        return new \KickAss\Commerce\Product\Controller\View(
            new \KickAss\Moltin\Bridge\Moltin\Authenticator(),
            new \KickAss\Commerce\Product\Repository\Product(
                new \KickAss\Moltin\Bridge\Moltin\Product(),
                new \Symfony\Component\Serializer\Normalizer\ObjectNormalizer()
            )
        );
    }

    public static function listing()
    {
        return new \KickAss\Commerce\Product\Controller\Listing(
            new \KickAss\Moltin\Bridge\Moltin\Authenticator(),
            new \KickAss\Commerce\Product\Repository\Product(
                new \KickAss\Moltin\Bridge\Moltin\Product(),
                new \Symfony\Component\Serializer\Normalizer\ObjectNormalizer()
            )
        );
    }
}