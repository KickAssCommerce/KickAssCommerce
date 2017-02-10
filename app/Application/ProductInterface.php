<?php

namespace App\Application;

interface ProductInterface
{
    public function getProductList(array $filter = array());
}