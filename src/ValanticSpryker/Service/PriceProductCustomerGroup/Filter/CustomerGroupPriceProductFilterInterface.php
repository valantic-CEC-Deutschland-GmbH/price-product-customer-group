<?php

declare(strict_types = 1);

namespace ValanticSpryker\Service\PriceProductCustomerGroup\Filter;

use Generated\Shared\Transfer\PriceProductFilterTransfer;

interface CustomerGroupPriceProductFilterInterface
{
    /**
     * @param array<\Generated\Shared\Transfer\PriceProductTransfer> $priceProductTransfers
     * @param \Generated\Shared\Transfer\PriceProductFilterTransfer $priceProductFilterTransfer
     *
     * @return array<\Generated\Shared\Transfer\PriceProductTransfer>
     */
    public function filterPriceProductsByCustomerGroup(
        array $priceProductTransfers,
        PriceProductFilterTransfer $priceProductFilterTransfer
    ): array;
}
