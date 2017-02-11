<?php

namespace KickAss\Commerce\Repository;

class Product implements ProductInterface
{
    /**
     * @var \KickAss\Commerce\Application\ProductInterface
     */
    private $product;

    public function __construct(
        \KickAss\Commerce\Application\ProductInterface $product
    ) {
        $this->product = $product;
    }

    /**
     * @param int $id
     * @return array
     */
    public function load($id)
    {
        return $this->product->getProductItem($id);
    }

    /**
     * @param array $filters
     * @return array
     */
    public function search(array $filters = array())
    {
        return $this->product->getProductList($filters);
    }
}