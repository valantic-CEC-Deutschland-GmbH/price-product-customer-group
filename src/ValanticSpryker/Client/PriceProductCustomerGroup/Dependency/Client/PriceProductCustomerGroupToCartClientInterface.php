<?php

declare(strict_types = 1);

namespace ValanticSpryker\Client\PriceProductCustomerGroup\Dependency\Client;

interface PriceProductCustomerGroupToCartClientInterface
{
    /**
     * @return void
     */
    public function reloadItems(): void;
}
