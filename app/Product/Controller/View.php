<?php

namespace App\Product\Controller;

class View
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;

    /**
     * @var \App\Application\AuthenticatorInterface
     */
    private $authenticator;

    /**
     * @var \App\Application\ProductInterface
     */
    private $product;

    /**
     * CategoryList constructor.
     * @param \App\Application\AuthenticatorInterface $authenticator
     */
    public function __construct(
        \App\Application\AuthenticatorInterface $authenticator,
        \App\Application\ProductInterface $product
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

        $products = $this->product->getProductList();

        if (!empty($products)) {
            $this->response->write(
                sprintf(
                    'We have %d product(s)!',
                    count($products['result'])
                )
            );

            array_walk(
                $products['result'],
                [$this, 'displayProductDetails']
            );
        }

        return $this->response;
    }

    private function displayProductDetails($product, $key)
    {
        $this->response->write('<br />');
        $this->response->write('ProductNumber: ' . $key . '<br />');
        $this->response->write(
            sprintf(
                'Sku: %s',
                $product['sku']
            )
        );
    }
}