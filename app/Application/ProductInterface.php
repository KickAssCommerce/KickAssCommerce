<?php

namespace App\Application;

interface ProductInterface
{
    public function getProductList(array $filter = array());
    public function getProductItem(int $identifier);
    public function getSearchResults(array $terms = array());
}