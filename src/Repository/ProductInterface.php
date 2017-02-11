<?php

namespace KickAss\Commerce\Repository;

interface ProductInterface
{
    /**
     * @param int $id
     * @return array
     */
    public function load($id);

    /**
     * @param array $filters
     * @return array
     */
    public function search(array $filters = array());
}