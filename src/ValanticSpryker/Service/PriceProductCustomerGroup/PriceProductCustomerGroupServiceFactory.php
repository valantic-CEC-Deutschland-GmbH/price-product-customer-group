<?php

declare(strict_types = 1);

namespace ValanticSpryker\Service\PriceProductCustomerGroup;

use Spryker\Service\Kernel\AbstractServiceFactory;
use ValanticSpryker\Service\PriceProductCustomerGroup\Filter\CustomerGroupPriceProductFilter;
use ValanticSpryker\Service\PriceProductCustomerGroup\Filter\CustomerGroupPriceProductFilterInterface;

/**
 * @method \ValanticSpryker\Service\PriceProductCustomerGroup\PriceProductCustomerGroupConfig getConfig()
 */
class PriceProductCustomerGroupServiceFactory extends AbstractServiceFactory
{
    /**
     * @return \ValanticSpryker\Service\PriceProductCustomerGroup\Filter\CustomerGroupPriceProductFilterInterface
     */
    public function createCustomerGroupPriceProductFilter(): CustomerGroupPriceProductFilterInterface
    {
        return new CustomerGroupPriceProductFilter();
    }
}
