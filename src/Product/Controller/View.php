<?php

namespace KickAss\Commerce\Product\Controller;

class View
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
     * @var \KickAss\Commerce\Repository\ProductInterface
     */
    private $product;

    /**
     * View constructor.
     * @param \KickAss\Commerce\Application\AuthenticatorInterface $authenticator
     * @param \KickAss\Commerce\Repository\ProductInterface $product
     */
    public function __construct(
        \KickAss\Commerce\Application\AuthenticatorInterface $authenticator,
        \KickAss\Commerce\Repository\ProductInterface $product
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

        $product = $this->product->loadByAttribute('slug', $request->getAttribute('slug'));

        $this->response->write('SKU: ' . $product->getSku());

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