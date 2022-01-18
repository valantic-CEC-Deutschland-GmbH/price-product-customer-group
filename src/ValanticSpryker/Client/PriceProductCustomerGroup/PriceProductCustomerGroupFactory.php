<?php

declare(strict_types = 1);

namespace ValanticSpryker\Client\PriceProductCustomerGroup;

use Spryker\Client\Kernel\AbstractFactory;
use ValanticSpryker\Client\PriceProductCustomerGroup\Dependency\Client\PriceProductCustomerGroupToCartClientInterface;

class PriceProductCustomerGroupFactory extends AbstractFactory
{
    /**
     * @return \ValanticSpryker\Client\PriceProductCustomerGroup\Dependency\Client\PriceProductCustomerGroupToCartClientInterface
     */
    public function getCartClient(): PriceProductCustomerGroupToCartClientInterface
    {
        return $this->getProvidedDependency(PriceProductCustomerGroupDependencyProvider::CLIENT_CART);
    }
}
