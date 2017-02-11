<?php

namespace KickAss\Commerce\Product;

class RouterContainer
{
    public static function view()
    {
        return new \KickAss\Commerce\Product\Controller\View(
            new \KickAss\Commerce\Application\Authenticator(),
            new \KickAss\Commerce\Repository\Product(
                new \KickAss\Commerce\Application\Product()
            )
        );
    }

    public static function listing()
    {
        return new \KickAss\Commerce\Product\Controller\Listing(
            new \KickAss\Commerce\Application\Authenticator(),
            new \KickAss\Commerce\Repository\Product(
                new \KickAss\Commerce\Application\Product()
            )
        );
    }
}