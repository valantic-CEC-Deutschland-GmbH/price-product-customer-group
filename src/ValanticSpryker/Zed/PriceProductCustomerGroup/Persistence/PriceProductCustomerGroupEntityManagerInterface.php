<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\PriceProductCustomerGroup\Persistence;

use Generated\Shared\Transfer\VsyPriceProductCustomerGroupEntityTransfer;
use Spryker\Shared\Kernel\Transfer\EntityTransferInterface;

interface PriceProductCustomerGroupEntityManagerInterface
{
    /**
     * @param \Generated\Shared\Transfer\VsyPriceProductCustomerGroupEntityTransfer $priceProductCustomerGroupEntityTransfer
     *
     * @return \Spryker\Shared\Kernel\Transfer\EntityTransferInterface
     */
    public function saveEntity(
        VsyPriceProductCustomerGroupEntityTransfer $priceProductCustomerGroupEntityTransfer
    ): EntityTransferInterface;

    /**
     * @param int $idPriceProductStore
     * @param int $idCustomerGroup
     *
     * @return void
     */
    public function deleteByIdPriceProductStoreAndIdCustomerGroup(
        int $idPriceProductStore,
        int $idCustomerGroup
    ): void;

    /**
     * @param int $idCustomerGroup
     *
     * @return void
     */
    public function deleteByIdCustomerGroup(int $idCustomerGroup): void;

    /**
     * @param int $idProductStore
     *
     * @return void
     */
    public function deleteByIdPriceProductStore(int $idProductStore): void;

    /**
     * @return void
     */
    public function deleteAll(): void;
}
