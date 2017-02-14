<?php

namespace KickAss\Commerce\Product\Repository;

use KickAss\Commerce\Application\ProductInterface as ApplicationProductInterface;
use KickAss\Commerce\Product\Map\Product as MapProduct;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class Product implements ProductInterface
{
    /**
     * @var \KickAss\Commerce\Application\ProductInterface
     */
    private $product;
    /**
     * @var \Symfony\Component\Serializer\Normalizer\ObjectNormalizer
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
     * @return \KickAss\Commerce\Product\Map\Product
     */
    public function load($id)
    {
        $productInfo = $this->product->getProductItem($id);

        return $this->populateProductRepository($productInfo['result']);
    }

    /**
     * @param string $attribute
     * @param string $value
     * @return \KickAss\Commerce\Product\Map\Product
     */
    public function loadByAttribute(string $attribute, string $value)
    {
        $productInfo = $this->product->getProductItemByAttribute($attribute, $value);

        return $this->populateProductRepository($productInfo);
    }

    /**
     * @param array $productData
     * @return \KickAss\Commerce\Product\Map\Product
     * @throws \Symfony\Component\Serializer\Exception\UnexpectedValueException
     */
    public function populateProductRepository($productData)
    {
        /** @var MapProduct $product */
        $product = $this->normalizer->denormalize($productData, MapProduct::class);
        return $product;
    }

    /**
     * @param array $filters
     * @return \KickAss\Commerce\Product\Map\Product[]
     * @throws \Symfony\Component\Serializer\Exception\UnexpectedValueException
     */
    public function search(array $filters = array())
    {
        $productInfo = $this->product->getProductList($filters);
        $products = [];
        foreach ($productInfo['result'] as $product) {
            $products[] = $this->normalizer->denormalize($product, MapProduct::class);
        }
        return $products;
    }
}
