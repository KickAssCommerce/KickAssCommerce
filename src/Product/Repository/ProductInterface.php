<?php

namespace KickAss\Commerce\Product\Repository;

interface ProductInterface
{
    /**
     * @param int $id
     * @return \KickAss\Commerce\Product\Map\Product
     */
    public function load($id);

    /**
     * @param array $filters
     * @return array
     */
    public function search(array $filters = array());

    /**
     * @param string $attribute
     * @param string $value
     * @return mixed
     */
    public function loadByAttribute(string $attribute, string $value);
}
