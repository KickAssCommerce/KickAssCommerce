<?php

namespace App\Application;

use Moltin\SDK\Facade\Product as MoltinProduct;

class Product implements ProductInterface
{
    /**
     * @param array $filter
     * @return array
     */
    public function getProductList(array $filter = array())
    {
        return MoltinProduct::Listing($filter);
    }
    /**
     * @param int $identifier
     * @return array
     */
    public function getProductItem(int $identifier)
    {
        return MoltinProduct::Get($identifier);
    }

    /**
     * @param array $terms
     * @return array
     */
    public function getSearchResults(array $terms = array())
    {
        return MoltinProduct::Search($terms);
    }
}