<?php

namespace KickAss\Commerce\Catalog\Category;

class CategoryList
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
     * @var \KickAss\Commerce\Application\ProductInterface
     */
    private $product;

    /**
     * CategoryList constructor.
     * @param \KickAss\Commerce\Application\AuthenticatorInterface $authenticator
     */
    public function __construct(
        \KickAss\Commerce\Application\AuthenticatorInterface $authenticator,
        \KickAss\Commerce\Application\ProductInterface $product
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