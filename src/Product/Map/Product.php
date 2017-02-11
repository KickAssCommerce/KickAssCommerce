<?php

namespace KickAss\Commerce\Product\Map;

class Product
{
    /**
     * @var string
     */
    private $sku;

    /**
     * @return string
     */
    public function getSku(){
        return $this->sku;
    }

    public function setSku($sku)
    {
        $this->sku = $sku;
    }
}