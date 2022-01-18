<?php

declare(strict_types=1);

namespace ValanticSpryker\Client\PriceProductCustomerGroup\Dependency\Client;

use Spryker\Client\Cart\CartClientInterface;

class PriceProductCustomerGroupToCartClientBridge implements PriceProductCustomerGroupToCartClientInterface
{
    /**
     * @var \Spryker\Client\Cart\CartClientInterface
     */
    protected CartClientInterface $cartClient;

    /**
     * @param \Spryker\Client\Cart\CartClientInterface $cartClient
     */
    public function __construct(CartClientInterface $cartClient)
    {
        $this->cartClient = $cartClient;
    }

    /**
     * @return void
     */
    public function reloadItems(): void
    {
        $this->cartClient->reloadItems();
    }
}
