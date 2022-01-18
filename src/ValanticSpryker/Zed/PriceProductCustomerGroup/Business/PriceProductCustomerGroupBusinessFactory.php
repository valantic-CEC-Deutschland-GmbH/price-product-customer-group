<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\PriceProductCustomerGroup\Business;

use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use ValanticSpryker\Zed\PriceProductCustomerGroup\Business\Model\CustomerGroupPriceWriter;
use ValanticSpryker\Zed\PriceProductCustomerGroup\Business\Model\CustomerGroupPriceWriterInterface;
use ValanticSpryker\Zed\PriceProductCustomerGroup\Business\Model\PriceProductDimensionExpander;
use ValanticSpryker\Zed\PriceProductCustomerGroup\Business\Model\PriceProductDimensionExpanderInterface;
use ValanticSpryker\Zed\PriceProductCustomerGroup\Dependency\Facade\PriceProductCustomerGroupToCustomerGroupFacadeInterface;
use ValanticSpryker\Zed\PriceProductCustomerGroup\Dependency\Facade\PriceProductCustomerGroupToPriceProductFacadeInterface;
use ValanticSpryker\Zed\PriceProductCustomerGroup\PriceProductCustomerGroupDependencyProvider;

/**
 * @method \ValanticSpryker\Zed\PriceProductCustomerGroup\Persistence\PriceProductCustomerGroupEntityManagerInterface getEntityManager()
 * @method \ValanticSpryker\Zed\PriceProductCustomerGroup\Persistence\PriceProductCustomerGroupRepositoryInterface getRepository()
 * @method \ValanticSpryker\Zed\PriceProductCustomerGroup\PriceProductCustomerGroupConfig getConfig()
 */
class PriceProductCustomerGroupBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \ValanticSpryker\Zed\PriceProductCustomerGroup\Business\Model\CustomerGroupPriceWriterInterface
     */
    public function createCustomerGroupPriceWriter(): CustomerGroupPriceWriterInterface
    {
        return new CustomerGroupPriceWriter(
            $this->getEntityManager(),
            $this->getRepository(),
            $this->getPriceProductFacade(),
        );
    }

    /**
     * @return \ValanticSpryker\Zed\PriceProductCustomerGroup\Business\Model\PriceProductDimensionExpanderInterface
     */
    public function createPriceProductDimensionExpander(): PriceProductDimensionExpanderInterface
    {
        return new PriceProductDimensionExpander(
            $this->getCustomerGroupFacade(),
        );
    }

    /**
     * @return \ValanticSpryker\Zed\PriceProductCustomerGroup\Dependency\Facade\PriceProductCustomerGroupToPriceProductFacadeInterface
     */
    public function getPriceProductFacade(): PriceProductCustomerGroupToPriceProductFacadeInterface
    {
        return $this->getProvidedDependency(PriceProductCustomerGroupDependencyProvider::FACADE_PRICE_PRODUCT);
    }

    /**
     * @return \ValanticSpryker\Zed\PriceProductCustomerGroup\Dependency\Facade\PriceProductCustomerGroupToCustomerGroupFacadeInterface
     */
    public function getCustomerGroupFacade(): PriceProductCustomerGroupToCustomerGroupFacadeInterface
    {
        return $this->getProvidedDependency(PriceProductCustomerGroupDependencyProvider::FACADE_CUSTOMER_GROUP);
    }
}
