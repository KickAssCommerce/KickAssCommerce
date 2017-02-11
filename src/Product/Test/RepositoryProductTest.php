<?php

namespace KickAss\Commerce\Product\Test;

use PHPUnit\Framework\TestCase;
use KickAss\Commerce\Product\Repository\Product as ProductRepository;
use KickAss\Commerce\Bridge\Moltin\Product as MoltinProduct;
use \Symfony\Component\Serializer\Normalizer\ObjectNormalizer;


/**
 * @covers ProductRepository
 */
final class RepositoryProductTest extends TestCase
{
    /**
     * test mapping
     */
    public function testPopulateProduct()
    {
        $product = new ProductRepository(
            new MoltinProduct(),
            new ObjectNormalizer()
        );

        $map = $product->populateProductReporitory([
            'sku' => 'foobar'
        ]);

        $this->assertEquals('foobar', $map->getSku());
    }
}