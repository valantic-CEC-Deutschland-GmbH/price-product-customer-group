<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\PriceProductCustomerGroup\Business\Model;

use Generated\Shared\Transfer\PriceProductTransfer;

interface CustomerGroupPriceWriterInterface
{
    /**
     * @param \Generated\Shared\Transfer\PriceProductTransfer $priceProductTransfer
     *
     * @return \Generated\Shared\Transfer\PriceProductTransfer
     */
    public function save(PriceProductTransfer $priceProductTransfer): PriceProductTransfer;

    /**
     * @param int $idCustomerGroup
     *
     * @return void
     */
    public function deleteByIdCustomerGroup(int $idCustomerGroup): void;

    /**
     * @return void
     */
    public function deleteAll(): void;

    /**
     * @param int $idPriceProductStore
     *
     * @return void
     */
    public function deleteByIdPriceProductStore(int $idPriceProductStore): void;
}
