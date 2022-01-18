<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\PriceProductCustomerGroup\Persistence;

use Generated\Shared\Transfer\PriceProductCriteriaTransfer;
use Generated\Shared\Transfer\PriceProductTransfer;
use Generated\Shared\Transfer\QueryCriteriaTransfer;

interface PriceProductCustomerGroupRepositoryInterface
{
    /**
     * @param \Generated\Shared\Transfer\PriceProductCriteriaTransfer $priceProductCriteriaTransfer
     *
     * @return \Generated\Shared\Transfer\QueryCriteriaTransfer|null
     */
    public function buildCustomerGroupPriceDimensionQueryCriteria(PriceProductCriteriaTransfer $priceProductCriteriaTransfer): ?QueryCriteriaTransfer;

    /**
     * @return \Generated\Shared\Transfer\QueryCriteriaTransfer
     */
    public function buildUnconditionalCustomerGroupPriceDimensionQueryCriteria(): QueryCriteriaTransfer;

    /**
     * @param \Generated\Shared\Transfer\PriceProductTransfer $priceProductTransfer
     *
     * @return string|null
     */
    public function findIdByPriceProductTransfer(PriceProductTransfer $priceProductTransfer): ?string;
}
