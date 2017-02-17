<?php

namespace KickAss\Commerce\Product\Map;

use PHPUnit\Framework\TestCase;

final class ProductTest extends TestCase
{
    /**
     * @dataProvider providerTestGetSku
     */
    public function testGetSku($input, $expected)
    {
        $product = new Product(
            $input
        );
        $this->assertEquals($expected, $product->getSku());
    }

    public function providerTestGetSku()
    {
        return [
            ['sample-sku', 'sample-sku'],
            [123, '123'],
            [9.87, '9.87']
        ];
    }

    /**
     * @throws \PHPUnit\Framework\Exception
     * @dataProvider providerTestSkuType
     */
    public function testSkuType($sku)
    {
        $this->expectException(\TypeError::class);
        new Product(
            $sku
        );
    }

    public function providerTestSkuType()
    {
        return [
            [new \stdClass()],
            [['something']]
        ];
    }
}