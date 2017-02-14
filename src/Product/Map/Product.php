<?php

namespace KickAss\Commerce\Product\Map;

class Product
{
    /**
     * @var string
     */
    private $sku;

    /**
     * Product constructor.
     * @param string $sku
     */
    public function __construct(string $sku)
    {
        $this->sku = $sku;
    }

    /**
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
    }
}
