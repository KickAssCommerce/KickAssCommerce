<?php

namespace App\Product;

class RouterContainer
{
    public static function view()
    {
        return new \App\Product\Controller\View(
            new \App\Application\Authenticator(),
            new \App\Application\Product()
        );
    }

    public static function listing()
    {
        return new \App\Product\Controller\Listing(
            new \App\Application\Authenticator(),
            new \App\Application\Product()
        );
    }
}