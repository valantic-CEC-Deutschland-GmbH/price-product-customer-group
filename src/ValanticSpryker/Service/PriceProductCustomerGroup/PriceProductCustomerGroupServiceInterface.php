<?php

declare(strict_types = 1);

namespace ValanticSpryker\Service\PriceProductCustomerGroup;

use Generated\Shared\Transfer\PriceProductFilterTransfer;

interface PriceProductCustomerGroupServiceInterface
{
    /**
     * Specification:
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
    public function filterPriceProductsByCustomerGroup(array $priceProductTransfers, PriceProductFilterTransfer $priceProductFilterTransfer): array;
}
