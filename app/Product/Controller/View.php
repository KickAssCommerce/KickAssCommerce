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

        $product = $this->product->getProductItemBySlug($request->getAttribute('slug'));

        var_dump($product);

        return $this->response;
    }

    private function displayProductDetails($product, $key, $attributes)
    {
        $this->response->write($attributes['identifier']);
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