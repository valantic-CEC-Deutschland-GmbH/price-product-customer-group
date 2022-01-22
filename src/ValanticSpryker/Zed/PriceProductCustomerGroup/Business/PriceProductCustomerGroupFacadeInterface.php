<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\PriceProductCustomerGroup\Business;

use Generated\Shared\Transfer\PriceProductDimensionTransfer;
use Generated\Shared\Transfer\PriceProductTransfer;

interface PriceProductCustomerGroupFacadeInterface
{
    /**
     * Specification:
     *  - Creates spy_price_product_store entry if does not exist.
     *  - Saves connection between spy_price_product_store and vsy_price_product_customer_group.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PriceProductTransfer $priceProductTransfer
     *
     * @return \Generated\Shared\Transfer\PriceProductTransfer
     */
    public function savePriceProductCustomerGroup(PriceProductTransfer $priceProductTransfer): PriceProductTransfer;

    /**
     * Specification:
     *  - Deletes connection records between spy_price_product_store and spy_price_product_business_unit by idCustomerGroup
     *
     * @api
     *
     * @param int $idCustomerGroup
     *
     * @return void
     */
    public function deletePriceProductCustomerGroupByIdCustomerGroup(int $idCustomerGroup): void;

    /**
     * Specification:
     *  - Deletes connection records between spy_price_product_store and vsy_price_product_customer_group by idPriceProductStore
     *
     * @api
     *
     * @param int $idPriceProductStore
     *
     * @return void
     */
    public function deletePriceProductCustomerGroupByIdPriceProductStore(int $idPriceProductStore): void;

    /**
     * Specification:
     *  - Deletes all connections between spy_price_product_store and spy_price_product_business_unit
     *
     * @api
     *
     * @return void
     */
    public function deleteAllPriceProductCustomerGroup(): void;

    /**
     * Specification:
     *  - Sets price dimension type as customer group.
     *  - Sets price dimension name using the customer group name.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PriceProductDimensionTransfer $priceProductDimensionTransfer
     *
     * @return \Generated\Shared\Transfer\PriceProductDimensionTransfer
     */
    public function expandPriceProductDimension(PriceProductDimensionTransfer $priceProductDimensionTransfer): PriceProductDimensionTransfer;
}
