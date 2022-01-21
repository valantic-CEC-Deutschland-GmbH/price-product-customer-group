<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\PriceProductCustomerGroup\Communication\Plugin\PriceProduct;

use Generated\Shared\Transfer\PriceProductDimensionTransfer;
use Spryker\Service\PriceProductExtension\Dependency\Plugin\PriceProductDimensionExpanderStrategyPluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \ValanticSpryker\Zed\PriceProductCustomerGroup\Persistence\PriceProductCustomerGroupRepositoryInterface getRepository()
 * @method \ValanticSpryker\Zed\PriceProductCustomerGroup\Business\PriceProductCustomerGroupFacadeInterface getFacade()
 * @method \ValanticSpryker\Zed\PriceProductCustomerGroup\Communication\PriceProductCustomerGroupCommunicationFactory getFactory()
 * @method \ValanticSpryker\Zed\PriceProductCustomerGroup\PriceProductCustomerGroupConfig getConfig()
 */
class CustomerGroupPriceProductDimensionExpanderStrategyPlugin extends AbstractPlugin implements PriceProductDimensionExpanderStrategyPluginInterface
{
    /**
     * {@inheritDoc}
     * Specification:
     *  - Returns true if strategy can be used for the transfer.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PriceProductDimensionTransfer $priceProductDimensionTransfer
     *
     * @return bool
     */
    public function isApplicable(PriceProductDimensionTransfer $priceProductDimensionTransfer): bool
    {
        return (bool)$priceProductDimensionTransfer->getIdCustomerGroup();
    }

    /**
     * {@inheritDoc}
     * Specification:
     *  - Returns expanded transfer.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PriceProductDimensionTransfer $priceProductDimensionTransfer
     *
     * @return \Generated\Shared\Transfer\PriceProductDimensionTransfer
     */
    public function expand(PriceProductDimensionTransfer $priceProductDimensionTransfer): PriceProductDimensionTransfer
    {
        return $this->getFacade()
            ->expandPriceProductDimension($priceProductDimensionTransfer);
    }
}
