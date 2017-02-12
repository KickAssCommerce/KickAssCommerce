<?php

namespace KickAss\Commerce\Application;

interface ProductInterface
{
    public function getProductList(array $filter = []);
    public function getProductItem(int $identifier);
    public function getProductItemByAttribute(string $attribute, string $value);
}