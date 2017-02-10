<?php

namespace Catalog\Category;

class CategoryList
{
    public function run($request, $response, $args)
    {
        $response->write("Hello world");

        return $response;
    }
}