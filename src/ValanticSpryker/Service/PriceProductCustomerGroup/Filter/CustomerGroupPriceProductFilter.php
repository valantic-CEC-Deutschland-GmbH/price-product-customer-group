<?php

declare(strict_types = 1);

namespace ValanticSpryker\Service\PriceProductCustomerGroup\Filter;

class CustomerGroupPriceProductFilter implements CustomerGroupPriceProductFilterInterface
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
    ): array {
        if (!$this->isPriceProductFilterHasCustomerGroup($priceProductFilterTransfer)) {
            return $priceProductTransfers;
        }

        return $this->filterOutPriceProductTransfersWithIncorrectCustomerGroup(
            $priceProductTransfers,
            $priceProductFilterTransfer,
        );
    }

    /**
     * @param \Generated\Shared\Transfer\PriceProductFilterTransfer $priceProductFilterTransfer
     *
     * @return bool
     */
    protected function isPriceProductFilterHasCustomerGroup(PriceProductFilterTransfer $priceProductFilterTransfer): bool
    {
        return $priceProductFilterTransfer->getPriceDimension() && $priceProductFilterTransfer->getPriceDimension()->getIdCustomerGroup();
    }

    /**
     * @param array<\Generated\Shared\Transfer\PriceProductTransfer> $priceProductTransfers
     * @param \Generated\Shared\Transfer\PriceProductFilterTransfer $priceProductFilterTransfer
     *
     * @return array<\Generated\Shared\Transfer\PriceProductTransfer>
     */
    protected function filterOutPriceProductTransfersWithIncorrectCustomerGroup(
        array $priceProductTransfers,
        PriceProductFilterTransfer $priceProductFilterTransfer
    ): array {
        return array_filter($priceProductTransfers, function (PriceProductTransfer $priceProductTransfer) use ($priceProductFilterTransfer) {
            return !$this->isPriceProductHasCustomerGroup($priceProductTransfer)
                || $this->isSameCustomerGroup($priceProductTransfer, $priceProductFilterTransfer);
        });
    }

    /**
     * @param \Generated\Shared\Transfer\PriceProductTransfer $priceProductTransfer
     *
     * @return bool
     */
    protected function isPriceProductHasCustomerGroup(PriceProductTransfer $priceProductTransfer): bool
    {
        return $priceProductTransfer->getPriceDimension() && $priceProductTransfer->getPriceDimension()->getIdCustomerGroup();
    }

    /**
     * @param \Generated\Shared\Transfer\PriceProductTransfer $priceProductTransfer
     * @param \Generated\Shared\Transfer\PriceProductFilterTransfer $priceProductFilterTransfer
     *
     * @return bool
     */
    protected function isSameCustomerGroup(
        PriceProductTransfer $priceProductTransfer,
        PriceProductFilterTransfer $priceProductFilterTransfer
    ): bool {
        return $priceProductTransfer->getPriceDimension()
            && $priceProductFilterTransfer->getPriceDimension()
            && $priceProductTransfer->getPriceDimension()->getIdCustomerGroup() === $priceProductFilterTransfer->getPriceDimension()->getIdCustomerGroup();
    }
}
