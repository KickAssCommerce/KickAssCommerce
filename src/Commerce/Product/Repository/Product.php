<?php

namespace KickAss\Commerce\Product\Repository;

use KickAss\Commerce\Application\ProductInterface as ApplicationProductInterface;
use KickAss\Commerce\Product\Map\Product as MapProduct;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class Product implements ProductInterface
{
    /**
     * @var ApplicationProductInterface
     */
    private $product;

    /**
     * @var ObjectNormalizer
     */
    private $normalizer;

    /**
     * Product constructor.
     *
     * @param ApplicationProductInterface $product
     * @param ObjectNormalizer $normalizer
     */
    public function __construct(
        ApplicationProductInterface $product,
        ObjectNormalizer $normalizer
    ) {
        $this->product = $product;
        $this->normalizer = $normalizer;
    }

    /**
     * @param int $id
     * @return MapProduct
     * @throws \Symfony\Component\Serializer\Exception\UnexpectedValueException
     */
    public function load($id)
    {
        $productInfo = $this->product->getProductItem($id);

        return $this->populateProductRepository($productInfo);
    }

    /**
     * @param string $attribute
     * @param string $value
     * @return MapProduct
     * @throws \Symfony\Component\Serializer\Exception\UnexpectedValueException
     */
    public function loadByAttribute(string $attribute, string $value)
    {
        $productInfo = $this->product->getProductItemByAttribute($attribute, $value);

        return $this->populateProductRepository($productInfo);
    }

    /**
     * @param array $productData
     * @return MapProduct
     * @throws \Symfony\Component\Serializer\Exception\UnexpectedValueException
     */
    private function populateProductRepository(array $productData)
    {
        /** @var MapProduct $product */
        $product = $this->normalizer->denormalize($productData, MapProduct::class);
        return $product;
    }

    /**
     * @param array $filters
     * @return MapProduct[]
     * @throws \Symfony\Component\Serializer\Exception\UnexpectedValueException
     */
    public function search(array $filters = array())
    {
        $productInfo = $this->product->getProductList($filters);
        $products = [];
        foreach ($productInfo as $product) {
            $products[] = $this->normalizer->denormalize($product, MapProduct::class);
        }
        return $products;
    }
}
