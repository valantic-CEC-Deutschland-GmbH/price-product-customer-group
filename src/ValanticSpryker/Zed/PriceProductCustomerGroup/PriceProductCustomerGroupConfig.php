<?php

declare(strict_types=1);

namespace ValanticSpryker\Zed\PriceProductCustomerGroup;

use Spryker\Zed\Kernel\AbstractBundleConfig;

/**
 * @method \ValanticSpryker\Shared\PriceProductCustomerGroup\PriceProductCustomerGroupConfig getSharedConfig()
 */
class PriceProductCustomerGroupConfig extends AbstractBundleConfig
{
    /**
     * @api
     *
     * @return string
     */
    public function getPriceDimensionMerchantRelationship(): string
    {
        return $this->getSharedConfig()
            ->getPriceDimensionCustomerGroup();
    }
}
