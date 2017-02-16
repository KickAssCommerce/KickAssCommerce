<?php

namespace KickAss\Commerce\Product\Repository;

use KickAss\Commerce\Product\Map\Product;
use PHPUnit\Framework\TestCase;
use KickAss\Commerce\Product\Repository\Product as ProductRepository;
use KickAss\Moltin\Bridge\Moltin\Product as MoltinProduct;
use \Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

final class RepositoryProductTest extends TestCase
{
    private $moltinMock;

    /**
     * @var ProductRepository
     */
    private $product;

    protected function setUp()
    {
        $this->moltinMock = $this->getMockBuilder(MoltinProduct::class)->getMock();
        $this->moltinMock->method('getProductItem')
            ->willReturn(['sku' => 'sample-sku']);
        $this->moltinMock->method('getProductItemByAttribute')
            ->willReturn(['sku' => 'sample-sku']);

        $this->product = new ProductRepository(
            $this->moltinMock,
            new ObjectNormalizer()
        );
    }

    public function testLoad()
    {
        $map = $this->product->load(123);

        $this->assertEquals('sample-sku', $map->getSku());
        $this->assertInstanceOf(Product::class, $map);
    }

    public function testLoadByAttribute()
    {
        $map = $this->product->loadByAttribute(
            'slug',
            'sample-slug'
        );

        $this->assertEquals('sample-sku', $map->getSku());
        $this->assertInstanceOf(Product::class, $map);
    }
}
