<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\PriceProductCustomerGroup\Persistence;

use Orm\Zed\PriceProduct\Persistence\SpyPriceProductStoreQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;
use ValanticSpryker\Zed\PriceProductCustomerGroup\Persistence\Propel\PriceDimensionQueryExpander\CustomerGroupPriceQueryExpander;

/**
 * @method \ValanticSpryker\Zed\PriceProductCustomerGroup\PriceProductCustomerGroupConfig getConfig()
 * @method \ValanticSpryker\Zed\PriceProductCustomerGroup\Persistence\PriceProductCustomerGroupEntityManagerInterface getEntityManager()
 * @method \ValanticSpryker\Zed\PriceProductCustomerGroup\Persistence\PriceProductCustomerGroupRepositoryInterface getRepository()
 */
class PriceProductCustomerGroupPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return \ValanticSpryker\Zed\PriceProductCustomerGroup\Persistence\Propel\PriceDimensionQueryExpander\CustomerGroupPriceQueryExpander
     */
    public function createCustomerGroupPriceQueryExpander(): CustomerGroupPriceQueryExpander
    {
        return new CustomerGroupPriceQueryExpander();
    }

    /**
     * @return \Orm\Zed\PriceProductCustomerGroup\Persistence\PyzPriceProductCustomerGroupQuery
     */
    public function createPriceProductCustomerGroupQuery(): PyzPriceProductCustomerGroupQuery
    {
        return PyzPriceProductCustomerGroupQuery::create();
    }

    /**
     * @return \Orm\Zed\PriceProduct\Persistence\SpyPriceProductStoreQuery
     */
    public function createPriceProductStoreQuery(): SpyPriceProductStoreQuery
    {
        return SpyPriceProductStoreQuery::create();
    }
}
