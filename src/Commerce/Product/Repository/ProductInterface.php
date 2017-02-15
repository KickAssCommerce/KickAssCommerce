<?php

namespace KickAss\Commerce\Product\Repository;

use \KickAss\Commerce\Product\Map\Product;

interface ProductInterface
{
    /**
     * @param int $id
     * @return Product
     */
    public function load($id);

    /**
     * @param array $filters
     * @return Product[]
     */
    public function search(array $filters = array());

    /**
     * @param string $attribute
     * @param string $value
     * @return Product
     */
    public function loadByAttribute(string $attribute, string $value);
}
