<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\PriceProductCustomerGroup\Persistence;

use Generated\Shared\Transfer\PriceProductCriteriaTransfer;
use Generated\Shared\Transfer\PriceProductTransfer;
use Generated\Shared\Transfer\QueryCriteriaTransfer;
use Orm\Zed\PriceProduct\Persistence\Base\SpyPriceProductStoreQuery;
use Orm\Zed\PriceProduct\Persistence\Map\SpyPriceProductStoreTableMap;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

/**
 * @method \ValanticSpryker\Zed\PriceProductCustomerGroup\Persistence\PriceProductCustomerGroupPersistenceFactory getFactory()
 */
class PriceProductCustomerGroupRepository extends AbstractRepository implements PriceProductCustomerGroupRepositoryInterface
{
    /**
     * @param \Generated\Shared\Transfer\PriceProductCriteriaTransfer $priceProductCriteriaTransfer
     *
     * @return \Generated\Shared\Transfer\QueryCriteriaTransfer|null
     */
    public function buildCustomerGroupPriceDimensionQueryCriteria(
        PriceProductCriteriaTransfer $priceProductCriteriaTransfer
    ): ?QueryCriteriaTransfer {
        return $this->getFactory()
            ->createCustomerGroupPriceQueryExpander()
            ->buildCustomerGroupPriceDimensionQueryCriteria($priceProductCriteriaTransfer);
    }

    /**
     * @return \Generated\Shared\Transfer\QueryCriteriaTransfer
     */
    public function buildUnconditionalCustomerGroupPriceDimensionQueryCriteria(): QueryCriteriaTransfer
    {
        return $this->getFactory()
            ->createCustomerGroupPriceQueryExpander()
            ->buildUnconditionalCustomerGroupPriceDimensionQueryCriteria();
    }

    /**
     * @param \Generated\Shared\Transfer\PriceProductTransfer $priceProductTransfer
     *
     * @return string|null
     */
    public function findIdByPriceProductTransfer(PriceProductTransfer $priceProductTransfer): ?string
    {
        $query = $this->getFactory()
            ->createPriceProductCustomerGroupQuery()
            ->usePriceProductStoreQuery()
            ->filterByFkStore($priceProductTransfer->getMoneyValue()->getFkStore())
            ->filterByFkCurrency($priceProductTransfer->getMoneyValue()->getFkCurrency())
            ->filterByFkPriceProduct($priceProductTransfer->getIdPriceProduct())
            ->endUse()
            ->filterByFkCustomerGroup($priceProductTransfer->getPriceDimension()->getIdCustomerGroup());

        if ($priceProductTransfer->getIdProduct()) {
            $query->filterByFkProduct($priceProductTransfer->getIdProduct());
        } else {
            $query->filterByFkProductAbstract($priceProductTransfer->getIdProductAbstract());
        }

        $entity = $query->findOne();

        if ($entity === null) {
            return null;
        }

        return $entity->getIdPriceProductCustomerGroup();
    }
}
