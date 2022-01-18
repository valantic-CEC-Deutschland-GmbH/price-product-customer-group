<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\PriceProductCustomerGroup\Persistence\Propel\PriceDimensionQueryExpander;

use Generated\Shared\Transfer\PriceProductCriteriaTransfer;
use Generated\Shared\Transfer\PriceProductDimensionTransfer;
use Generated\Shared\Transfer\QueryCriteriaTransfer;
use Generated\Shared\Transfer\QueryJoinTransfer;
use Orm\Zed\PriceProductCustomerGroup\Persistence\Map\VsyPriceProductCustomerGroupTableMap;
use Propel\Runtime\ActiveQuery\Criteria;

class CustomerGroupPriceQueryExpander implements CustomerGroupPriceQueryExpanderInterface
{
    /**
     * @uses \Orm\Zed\PriceProduct\Persistence\Map\VsyPriceProductCustomerGroupTableMap::COL_ID_PRICE_PRODUCT_STORE
     *
     * @var string
     */
    public const COL_ID_PRICE_PRODUCT_STORE = 'spy_price_product_store.id_price_product_store';

    /**
     * @param \Generated\Shared\Transfer\PriceProductCriteriaTransfer $priceProductCriteriaTransfer
     *
     * @return \Generated\Shared\Transfer\QueryCriteriaTransfer|null
     */
    public function buildCustomerGroupPriceDimensionQueryCriteria(PriceProductCriteriaTransfer $priceProductCriteriaTransfer): ?QueryCriteriaTransfer
    {
        $idCustomerGroup = null;
        if ($priceProductCriteriaTransfer->getPriceDimension()) {
            $idCustomerGroup = $priceProductCriteriaTransfer->getPriceDimension()->getIdCustomerGroup();
        }

        if ($idCustomerGroup !== null) {
            return $this->createQueryCriteriaTransfer($idCustomerGroup);
        }

        $idCustomerGroup = $this->findCustomerGroupId($priceProductCriteriaTransfer);
        if ($idCustomerGroup === null) {
            return null;
        }

        return $this->createQueryCriteriaTransfer($idCustomerGroup);
    }

    /**
     * @return \Generated\Shared\Transfer\QueryCriteriaTransfer
     */
    public function buildUnconditionalCustomerGroupPriceDimensionQueryCriteria(): QueryCriteriaTransfer
    {
        return (new QueryCriteriaTransfer())
            ->setWithColumns([
                VsyPriceProductCustomerGroupTableMap::COL_FK_CUSTOMER_GROUP => PriceProductDimensionTransfer::ID_CUSTOMER_GROUP,
            ])
            ->addJoin(
                (new QueryJoinTransfer())
                    ->setLeft([static::COL_ID_PRICE_PRODUCT_STORE])
                    ->setRight([VsyPriceProductCustomerGroupTableMap::COL_FK_CUSTOMER_GROUP])
                    ->setJoinType(Criteria::LEFT_JOIN),
            );
    }

    /**
     * @param \Generated\Shared\Transfer\PriceProductCriteriaTransfer $priceProductCriteriaTransfer
     *
     * @return int|null
     */
    protected function findCustomerGroupId(PriceProductCriteriaTransfer $priceProductCriteriaTransfer): ?int
    {
        if (!$priceProductCriteriaTransfer->getQuote()) {
            return null;
        }

        $customerTransfer = $priceProductCriteriaTransfer->getQuote()->getCustomer();
        if ($customerTransfer === null) {
            return null;
        }

        $customerGroupTransfer = $customerTransfer->getCustomerGroup();
        if ($customerGroupTransfer === null) {
            return null;
        }

        return $customerGroupTransfer->getIdCustomerGroup();
    }

    /**
     * @param int $idCustomerGroup
     *
     * @return \Generated\Shared\Transfer\QueryCriteriaTransfer
     */
    protected function createQueryCriteriaTransfer(int $idCustomerGroup): QueryCriteriaTransfer
    {
        return (new QueryCriteriaTransfer())
            ->setWithColumns([
                VsyPriceProductCustomerGroupTableMap::COL_FK_CUSTOMER_GROUP => PriceProductDimensionTransfer::ID_CUSTOMER_GROUP,
            ])
            ->addJoin(
                (new QueryJoinTransfer())
                    ->setRelation('PriceProductCustomerGroup')
                    ->setCondition(VsyPriceProductCustomerGroupTableMap::COL_FK_CUSTOMER_GROUP
                        . ' = ' . $idCustomerGroup)
                    ->setJoinType(Criteria::LEFT_JOIN),
            );
    }
}
