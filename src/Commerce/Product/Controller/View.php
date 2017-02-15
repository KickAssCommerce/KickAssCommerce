<?php

namespace KickAss\Commerce\Product\Controller;

use KickAss\Authentication\AuthenticatorInterface;
use KickAss\Commerce\Product\Repository\ProductInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class View
{
    /**
     * @var ResponseInterface
     */
    private $response;
    /**
     * @var AuthenticatorInterface
     */
    private $authenticator;
    /**
     * @var ProductInterface
     */
    private $product;

    /**
     * View constructor.
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
