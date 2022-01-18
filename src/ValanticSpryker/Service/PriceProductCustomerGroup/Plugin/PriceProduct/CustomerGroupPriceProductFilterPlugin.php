<?php

declare(strict_types = 1);

namespace ValanticSpryker\Service\PriceProductCustomerGroup\Plugin\PriceProduct;

use Spryker\Service\Kernel\AbstractPlugin;
use Spryker\Service\PriceProductExtension\Dependency\Plugin\PriceProductFilterPluginInterface;
use ValanticSpryker\Shared\PriceProductCustomerGroup\PriceProductCustomerGroupConfig;

/**
 * @method \ValanticSpryker\Service\PriceProductCustomerGroup\PriceProductCustomerGroupServiceInterface getService()
 */
class CustomerGroupPriceProductFilterPlugin extends AbstractPlugin implements PriceProductFilterPluginInterface
{
    /**
     * {@inheritDoc}
     * - Filters `PriceProductTransfers` by `PriceProductFilterTransfer.priceDimension.idCustomerGroup`.
     * - Filters out all `PriceProductTransfers` with customer group if `PriceProductFilterTransfer.priceDimension.idCustomerGroup` is not set.
     * - Filters out all `PriceProductTransfers` where `PriceProductTransfer.priceDimension.idCustomerGroup` is different from `PriceProductFilterTransfer.priceDimension.idCustomerGroup`.
     * - When `PriceProductFilterTransfer.priceDimension.idCustomerGroup` is set and `PriceProductTransfer` doesn't have a customer group, it is not filtered out.
     *
     * @api
     *
     * @param array<\Generated\Shared\Transfer\PriceProductTransfer> $priceProductTransfers
     * @param \Generated\Shared\Transfer\PriceProductFilterTransfer $priceProductFilterTransfer
     *
     * @return array<\Generated\Shared\Transfer\PriceProductTransfer>
     */
    public function filter(array $priceProductTransfers, PriceProductFilterTransfer $priceProductFilterTransfer): array
    {
        return $this->getService()
            ->filterPriceProductsByCustomerGroup($priceProductTransfers, $priceProductFilterTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @return string
     */
    public function getDimensionName(): string
    {
        return PriceProductCustomerGroupConfig::PRICE_DIMENSION_CUSTOMER_GROUP;
    }
}
