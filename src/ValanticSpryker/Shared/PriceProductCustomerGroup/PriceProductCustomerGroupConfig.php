<?php

declare(strict_types = 1);

namespace ValanticSpryker\Shared\PriceProductCustomerGroup;

use Spryker\Shared\Kernel\AbstractSharedConfig;

class PriceProductCustomerGroupConfig extends AbstractSharedConfig
{
    /**
     * @var string
     */
    public const PRICE_DIMENSION_CUSTOMER_GROUP = 'PRICE_DIMENSION_CUSTOMER_GROUP';

    /**
     * @api
     *
     * @return string
     */
    public function getPriceDimensionCustomerGroup(): string
    {
        return static::PRICE_DIMENSION_CUSTOMER_GROUP;
    }
}
