<?php

namespace KickAss\Commerce\Product\Map;

use PHPUnit\Framework\TestCase;

final class ProductTest extends TestCase
{
    public function testGetSku()
    {
        $product = new Product(
            'sample-sku'
        );
        $this->assertEquals('sample-sku', $product->getSku());
    }
}