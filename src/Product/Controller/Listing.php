<?php

namespace KickAss\Commerce\Product\Controller;

use KickAss\Commerce\Application\AuthenticatorInterface;
use KickAss\Commerce\Product\Map\Product;
use KickAss\Commerce\Product\Repository\ProductInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

class Listing
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    /**
     * @var \KickAss\Commerce\Application\AuthenticatorInterface
     */
    private $authenticator;
    /**
     * @var \KickAss\Commerce\Product\Repository\ProductInterface
     */
    private $product;

    /**
     * Listing constructor.
     * @param AuthenticatorInterface $authenticator
     * @param ProductInterface $product
     */
    public function __construct(
        AuthenticatorInterface $authenticator,
        ProductInterface $product
    ) {
        $this->authenticator = $authenticator;
        $this->product = $product;
    }

    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @return ResponseInterface
     */
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ) {
        $this->response = $response;
        $this->authenticator->authenticate();

        $products = $this->product->search();

        if (!empty($products)) {
            $this->response->write(
                sprintf(
                    'We have %d product(s)!',
                    count($products)
                )
            );

            array_walk(
                $products,
                [$this, 'displayProductDetails']
            );
        }

        return $this->response;
    }

    /**
     * @param Product $product
     * @param $key
     */
    private function displayProductDetails(Product $product, $key)
    {
        $this->response->write('<br />');
        $this->response->write('ProductNumber: ' . $key . '<br />');
        $this->response->write(
            sprintf(
                'Sku: %s',
                $product->getSku()
            )
        );
    }
}
