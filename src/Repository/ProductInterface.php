<?php

namespace KickAss\Commerce\Repository;

interface ProductInterface
{
    /**
     * @param int $id
     * @return \KickAss\Commerce\Map\Product
     */
    public function load($id);

    /**
     * @param array $filters
     * @return array
     */
    public function search(array $filters = array());
}