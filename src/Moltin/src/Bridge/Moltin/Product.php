<?php

namespace KickAss\Moltin\Bridge\Moltin;

use Moltin\SDK\Facade\Product as MoltinProduct;
use KickAss\Commerce\Product\Exception\ProductNotFoundException as ProductException;

class Product implements \KickAss\Commerce\Application\ProductInterface
{
    /**
     * @param array $filter
     * @return array
     */
    public function getProductList(array $filter = [])
    {
        return MoltinProduct::Search($filter);
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
     * @param string $attribute
     * @param string $value
     * @return array
     * @throws ProductException
     */
    public function getProductItemByAttribute(string $attribute, string $value)
    {
        $results = MoltinProduct::Search([$attribute => $value]);
        foreach ($results['result'] as $result) {
            if ($result[$attribute] == $value) {
                return $result;
            }
        }

        throw new ProductException("Product not found");
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
