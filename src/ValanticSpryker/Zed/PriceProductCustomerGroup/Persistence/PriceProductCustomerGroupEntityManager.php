<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\PriceProductCustomerGroup\Persistence;

use Propel\Runtime\Collection\ObjectCollection;
use Spryker\Shared\Kernel\Transfer\EntityTransferInterface;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

/**
 * @method \ValanticSpryker\Zed\PriceProductCustomerGroup\Persistence\PriceProductCustomerGroupPersistenceFactory getFactory()
 */
class PriceProductCustomerGroupEntityManager extends AbstractEntityManager implements PriceProductCustomerGroupEntityManagerInterface
{
    /**
     * @param \Generated\Shared\Transfer\VsyPriceProductCustomerGroupEntityTransfer $priceProductCustomerGroupEntityTransfer
     *
     * @return \Spryker\Shared\Kernel\Transfer\EntityTransferInterface
     */
    public function saveEntity(
        VsyPriceProductCustomerGroupEntityTransfer $priceProductCustomerGroupEntityTransfer
    ): EntityTransferInterface {
        if ($priceProductCustomerGroupEntityTransfer->getIdPriceProductCustomerGroup()) {
            return $this->updatePriceProductCustomerGroupEntity($priceProductCustomerGroupEntityTransfer);
        }

        return $this->createPriceProductCustomerGroupEntity($priceProductCustomerGroupEntityTransfer);
    }

    /**
     * @param int $idPriceProductStore
     * @param int $idCustomerGroup
     *
     * @return void
     */
    public function deleteByIdPriceProductStoreAndIdCustomerGroup(
        int $idPriceProductStore,
        int $idCustomerGroup
    ): void {
        $priceProductCustomerGroupEnitity = $this->getFactory()
            ->createPriceProductCustomerGroupQuery()
            ->filterByFkCustomerGroup($idCustomerGroup)
            ->filterByFkPriceProductStore($idPriceProductStore)
            ->findOne();

        if ($priceProductCustomerGroupEnitity) {
            $priceProductCustomerGroupEnitity->delete();
        }
    }

    /**
     * @param int $idCustomerGroup
     *
     * @return void
     */
    public function deleteByIdCustomerGroup(int $idCustomerGroup): void
    {
        $priceProductCustomerGroupsEntities = $this->getFactory()
            ->createPriceProductCustomerGroupQuery()
            ->filterByFkCustomerGroup($idCustomerGroup)
            ->find();

        $this->deleteEntitiesAndTriggerEvents($priceProductCustomerGroupsEntities);
    }

    /**
     * @param int $idProductStore
     *
     * @return void
     */
    public function deleteByIdPriceProductStore(int $idProductStore): void
    {
        $priceProductCustomerGroupsEntities = $this->getFactory()
            ->createPriceProductCustomerGroupQuery()
            ->filterByFkPriceProductStore($idProductStore)
            ->find();

        $this->deleteEntitiesAndTriggerEvents($priceProductCustomerGroupsEntities);
    }

    /**
     * @return void
     */
    public function deleteAll(): void
    {
        $priceProductCustomerGroupsEntities = $this->getFactory()
            ->createPriceProductCustomerGroupQuery()
            ->find();

        $this->deleteEntitiesAndTriggerEvents($priceProductCustomerGroupsEntities);
    }

    /**
     * @param \Generated\Shared\Transfer\VsyPriceProductCustomerGroupEntityTransfer $priceProductCustomerGroupEntityTransfer
     *
     * @return \Generated\Shared\Transfer\VsyPriceProductCustomerGroupEntityTransfer
     */
    protected function createPriceProductCustomerGroupEntity(
        VsyPriceProductCustomerGroupEntityTransfer $priceProductCustomerGroupEntityTransfer
    ): VsyPriceProductCustomerGroupEntityTransfer {
        $priceProductCustomerGroupEntity = new VsyPriceProductCustomerGroup();
        $priceProductCustomerGroupEntity->fromArray($priceProductCustomerGroupEntityTransfer->toArray());
        $priceProductCustomerGroupEntity->save();

        $priceProductCustomerGroupEntityTransfer->setIdPriceProductCustomerGroup(
            $priceProductCustomerGroupEntity->getIdPriceProductCustomerGroup(),
        );

        return $priceProductCustomerGroupEntityTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\VsyPriceProductCustomerGroupEntityTransfer $priceProductCustomerGroupEntityTransfer
     *
     * @return \Generated\Shared\Transfer\VsyPriceProductCustomerGroupEntityTransfer
     */
    protected function updatePriceProductCustomerGroupEntity(
        VsyPriceProductCustomerGroupEntityTransfer $priceProductCustomerGroupEntityTransfer
    ): VsyPriceProductCustomerGroupEntityTransfer {
        $priceProductCustomerGroupEntity = $this->getFactory()
            ->createPriceProductCustomerGroupQuery()
            ->filterByIdPriceProductCustomerGroup(
                $priceProductCustomerGroupEntityTransfer->getIdPriceProductCustomerGroup(),
            )
            ->findOne();

        if ($priceProductCustomerGroupEntity === null) {
            return $priceProductCustomerGroupEntityTransfer;
        }

        $priceProductCustomerGroupEntity->fromArray($priceProductCustomerGroupEntityTransfer->toArray());
        $priceProductCustomerGroupEntity->save();

        $priceProductCustomerGroupEntityTransfer->setIdPriceProductCustomerGroup(
            $priceProductCustomerGroupEntity->getIdPriceProductCustomerGroup(),
        );

        return $priceProductCustomerGroupEntityTransfer;
    }

    /**
     * @param \Orm\Zed\PriceProductCustomerGroup\Persistence\VsyPriceProductCustomerGroup[]|\Propel\Runtime\Collection\ObjectCollection $priceProductCustomerGroupEntities
     *
     * @return void
     */
    protected function deleteEntitiesAndTriggerEvents(ObjectCollection $priceProductCustomerGroupEntities): void
    {
        foreach ($priceProductCustomerGroupEntities as $priceProductCustomerGroupEntity) {
            $priceProductCustomerGroupEntity->delete();
        }
    }
}
