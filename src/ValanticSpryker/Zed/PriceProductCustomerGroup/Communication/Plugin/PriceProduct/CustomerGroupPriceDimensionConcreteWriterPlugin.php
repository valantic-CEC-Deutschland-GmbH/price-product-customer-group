<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\PriceProductCustomerGroup\Communication\Plugin\PriceProduct;

use Generated\Shared\Transfer\PriceProductTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\PriceProductExtension\Dependency\Plugin\PriceDimensionConcreteSaverPluginInterface;
use ValanticSpryker\Shared\PriceProductCustomerGroup\PriceProductCustomerGroupConfig;

/**
 * @method \ValanticSpryker\Zed\PriceProductCustomerGroup\Business\PriceProductCustomerGroupFacadeInterface getFacade()
 * @method \ValanticSpryker\Zed\PriceProductCustomerGroup\Communication\PriceProductCustomerGroupCommunicationFactory getFactory()
 * @method \ValanticSpryker\Zed\PriceProductCustomerGroup\PriceProductCustomerGroupConfig getConfig()
 */
class CustomerGroupPriceDimensionConcreteWriterPlugin extends AbstractPlugin implements PriceDimensionConcreteSaverPluginInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PriceProductTransfer $priceProductTransfer
     *
     * @return \Generated\Shared\Transfer\PriceProductTransfer
     */
    public function savePrice(PriceProductTransfer $priceProductTransfer): PriceProductTransfer
    {
        return $this->getFacade()
            ->savePriceProductCustomerGroup($priceProductTransfer);
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
