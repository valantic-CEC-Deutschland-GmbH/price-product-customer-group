<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\PriceProductCustomerGroup\Business;

use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \ValanticSpryker\Zed\PriceProductCustomerGroup\Business\PriceProductCustomerGroupBusinessFactory getFactory()
 * @method \ValanticSpryker\Zed\PriceProductCustomerGroup\Persistence\PriceProductCustomerGroupEntityManagerInterface getEntityManager()
 * @method \ValanticSpryker\Zed\PriceProductCustomerGroup\Persistence\PriceProductCustomerGroupRepositoryInterface getRepository()
 */
class PriceProductCustomerGroupFacade extends AbstractFacade implements PriceProductCustomerGroupFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PriceProductTransfer $priceProductTransfer
     *
     * @return \Generated\Shared\Transfer\PriceProductTransfer
     */
    public function savePriceProductCustomerGroup(PriceProductTransfer $priceProductTransfer): PriceProductTransfer
    {
        return $this->getFactory()
            ->createCustomerGroupPriceWriter()
            ->save($priceProductTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param int $idCustomerGroup
     *
     * @return void
     */
    public function deletePriceProductCustomerGroupByIdCustomerGroup(int $idCustomerGroup): void
    {
        $this->getFactory()
            ->createCustomerGroupPriceWriter()
            ->deleteByIdCustomerGroup($idCustomerGroup);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @return void
     */
    public function deleteAllPriceProductCustomerGroup(): void
    {
        $this->getFactory()
            ->createCustomerGroupPriceWriter()
            ->deleteAll();
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PriceProductDimensionTransfer $priceProductDimensionTransfer
     *
     * @return \Generated\Shared\Transfer\PriceProductDimensionTransfer
     */
    public function expandPriceProductDimension(PriceProductDimensionTransfer $priceProductDimensionTransfer): PriceProductDimensionTransfer
    {
        return $this->getFactory()
            ->createPriceProductDimensionExpander()
            ->expand($priceProductDimensionTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @deprecated will be removed without replacement.
     *
     * @param int $idPriceProductStore
     *
     * @return void
     */
    public function deletePriceProductCustomerGroupByIdPriceProductStore(int $idPriceProductStore): void
    {
        $this->getFactory()
            ->createCustomerGroupPriceWriter()
            ->deleteByIdPriceProductStore($idPriceProductStore);
    }
}
