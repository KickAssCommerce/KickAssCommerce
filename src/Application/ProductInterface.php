<?php

namespace KickAss\Commerce\Application;

interface ProductInterface
{
    /**
     * @param array $filter
     * @return array
     */
    public function getProductList(array $filter = []);

    /**
     * @param int $identifier
     * @return array
     */
    public function getProductItem(int $identifier);

    /**
     * @param string $attribute
     * @param string $value
     * @return array
     */
    public function getProductItemByAttribute(string $attribute, string $value);
}
