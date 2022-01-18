<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\PriceProductCustomerGroup\Business\Model;

interface PriceProductDimensionExpanderInterface
{
    /**
     * @param \Generated\Shared\Transfer\PriceProductDimensionTransfer $priceProductDimensionTransfer
     *
     * @return \Generated\Shared\Transfer\PriceProductDimensionTransfer
     */
    public function expand(PriceProductDimensionTransfer $priceProductDimensionTransfer): PriceProductDimensionTransfer;
}
