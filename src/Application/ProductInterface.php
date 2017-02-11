<?php

namespace KickAss\Commerce\Application;

interface ProductInterface
{
    public function getProductList(array $filter = array());
    public function getProductItem(int $identifier);
}