<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\PriceProductCustomerGroup\Communication\Plugin\PriceProduct;

use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\PriceProductExtension\Dependency\Plugin\PriceDimensionQueryCriteriaPluginInterface;
use Spryker\Zed\PriceProductExtension\Dependency\Plugin\PriceDimensionUnconditionalQueryCriteriaPluginInterface;
use ValanticSpryker\Shared\PriceProductCustomerGroup\PriceProductCustomerGroupConfig;

/**
 * @method \ValanticSpryker\Zed\PriceProductCustomerGroup\Persistence\PriceProductCustomerGroupRepositoryInterface getRepository()
 * @method \ValanticSpryker\Zed\PriceProductCustomerGroup\Business\PriceProductCustomerGroupFacadeInterface getFacade()
 * @method \ValanticSpryker\Zed\PriceProductCustomerGroup\Communication\PriceProductCustomerGroupCommunicationFactory getFactory()
 * @method \ValanticSpryker\Zed\PriceProductCustomerGroup\PriceProductCustomerGroupConfig getConfig()
 */
class CustomerGroupPriceQueryCriteriaPlugin extends AbstractPlugin implements PriceDimensionQueryCriteriaPluginInterface, PriceDimensionUnconditionalQueryCriteriaPluginInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PriceProductCriteriaTransfer $priceProductCriteriaTransfer
     *
     * @return \Generated\Shared\Transfer\QueryCriteriaTransfer|null
     */
    public function buildPriceDimensionQueryCriteria(PriceProductCriteriaTransfer $priceProductCriteriaTransfer): ?QueryCriteriaTransfer
    {
        return $this->getRepository()
            ->buildCustomerGroupPriceDimensionQueryCriteria($priceProductCriteriaTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @return \Generated\Shared\Transfer\QueryCriteriaTransfer
     */
    public function buildUnconditionalPriceDimensionQueryCriteria(): QueryCriteriaTransfer
    {
        return $this->getRepository()
            ->buildUnconditionalCustomerGroupPriceDimensionQueryCriteria();
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
