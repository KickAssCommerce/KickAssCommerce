<?php

namespace KickAss\Commerce\Product\Controller;

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
     * @param \KickAss\Commerce\Application\AuthenticatorInterface $authenticator
     * @param \KickAss\Commerce\Product\Repository\ProductInterface $product
     */
    public function __construct(
        \KickAss\Commerce\Application\AuthenticatorInterface $authenticator,
        \KickAss\Commerce\Product\Repository\ProductInterface $product
    ) {
        $this->authenticator = $authenticator;
        $this->product = $product;
    }

    public function __invoke(
        \Psr\Http\Message\ServerRequestInterface $request,
        \Psr\Http\Message\ResponseInterface $response
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
     * @param \KickAss\Commerce\Map\Product $product
     * @param $key
     */
    private function displayProductDetails(\KickAss\Commerce\Map\Product $product, $key)
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