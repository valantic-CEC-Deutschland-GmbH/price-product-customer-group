<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\PriceProductCustomerGroup\Business\Model;

use Generated\Shared\Transfer\PriceProductTransfer;
use Generated\Shared\Transfer\VsyPriceProductCustomerGroupEntityTransfer;
use ValanticSpryker\Zed\PriceProductCustomerGroup\Dependency\Facade\PriceProductCustomerGroupToPriceProductFacadeInterface;
use ValanticSpryker\Zed\PriceProductCustomerGroup\Persistence\PriceProductCustomerGroupEntityManagerInterface;
use ValanticSpryker\Zed\PriceProductCustomerGroup\Persistence\PriceProductCustomerGroupRepositoryInterface;

class CustomerGroupPriceWriter implements CustomerGroupPriceWriterInterface
{
    /**
     * @var \ValanticSpryker\Zed\PriceProductCustomerGroup\Persistence\PriceProductCustomerGroupEntityManagerInterface
     */
    protected $priceProductCustomerGroupEntityManager;

    /**
     * @var \ValanticSpryker\Zed\PriceProductCustomerGroup\Persistence\PriceProductCustomerGroupRepositoryInterface
     */
    protected $priceProductCustomerGroupRepository;

    /**
     * @var \ValanticSpryker\Zed\PriceProductCustomerGroup\Dependency\Facade\PriceProductCustomerGroupToPriceProductFacadeInterface
     */
    protected $priceProductFacade;

    /**
     * @param \ValanticSpryker\Zed\PriceProductCustomerGroup\Persistence\PriceProductCustomerGroupEntityManagerInterface $priceProductCustomerGroupEntityManager
     * @param \ValanticSpryker\Zed\PriceProductCustomerGroup\Persistence\PriceProductCustomerGroupRepositoryInterface $priceProductCustomerGroupRepository
     * @param \ValanticSpryker\Zed\PriceProductCustomerGroup\Dependency\Facade\PriceProductCustomerGroupToPriceProductFacadeInterface $priceProductFacade
     */
    public function __construct(
        PriceProductCustomerGroupEntityManagerInterface $priceProductCustomerGroupEntityManager,
        PriceProductCustomerGroupRepositoryInterface $priceProductCustomerGroupRepository,
        PriceProductCustomerGroupToPriceProductFacadeInterface $priceProductFacade
    ) {
        $this->priceProductCustomerGroupEntityManager = $priceProductCustomerGroupEntityManager;
        $this->priceProductCustomerGroupRepository = $priceProductCustomerGroupRepository;
        $this->priceProductFacade = $priceProductFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\PriceProductTransfer $priceProductTransfer
     *
     * @return \Generated\Shared\Transfer\PriceProductTransfer
     */
    public function save(PriceProductTransfer $priceProductTransfer): PriceProductTransfer
    {
        $priceProductTransfer
            ->requireMoneyValue()
            ->requirePriceDimension();

        $priceDimensionTransfer = $priceProductTransfer->getPriceDimension();
        $priceDimensionTransfer->requireIdCustomerGroup();

        if (!$priceProductTransfer->getIdPriceProduct()) {
            $priceProductTransfer = $this->persistPriceProductStore($priceProductTransfer);
        }

        $priceProductCustomerGroupEntityTransfer = $this->getPriceProductCustomerGroupEntityTransfer($priceProductTransfer);
        $this->priceProductCustomerGroupEntityManager
            ->saveEntity($priceProductCustomerGroupEntityTransfer);

        return $priceProductTransfer;
    }

    /**
     * @param int $idCustomerGroup
     *
     * @return void
     */
    public function deleteByIdCustomerGroup(int $idCustomerGroup): void
    {
        $this->priceProductCustomerGroupEntityManager
            ->deleteByIdCustomerGroup($idCustomerGroup);
    }

    /**
     * @param int $idPriceProductStore
     *
     * @return void
     */
    public function deleteByIdPriceProductStore(int $idPriceProductStore): void
    {
        $this->priceProductCustomerGroupEntityManager
            ->deleteByIdPriceProductStore($idPriceProductStore);
    }

    /**
     * @return void
     */
    public function deleteAll(): void
    {
        $this->priceProductCustomerGroupEntityManager
            ->deleteAll();
    }

    /**
     * @param \Generated\Shared\Transfer\PriceProductTransfer $priceProductTransfer
     *
     * @return \Generated\Shared\Transfer\VsyPriceProductCustomerGroupEntityTransfer
     */
    protected function getPriceProductCustomerGroupEntityTransfer(
        PriceProductTransfer $priceProductTransfer
    ): VsyPriceProductCustomerGroupEntityTransfer {
        $idPriceProductCustomerGroup = $this->priceProductCustomerGroupRepository
            ->findIdByPriceProductTransfer($priceProductTransfer);

        $priceProductCustomerGroupEntityTransfer = (new VsyPriceProductCustomerGroupEntityTransfer())
            ->setIdPriceProductCustomerGroup($idPriceProductCustomerGroup)
            ->setFkCustomerGroup($priceProductTransfer->getPriceDimension()->getIdCustomerGroup())
            ->setFkPriceProductStore((string)$priceProductTransfer->getMoneyValue()->getIdEntity());

        if ($priceProductTransfer->getIdProduct()) {
            $priceProductCustomerGroupEntityTransfer->setFkProduct($priceProductTransfer->getIdProduct());

            return $priceProductCustomerGroupEntityTransfer;
        }

        $priceProductCustomerGroupEntityTransfer->setFkProductAbstract($priceProductTransfer->getIdProductAbstract());

        return $priceProductCustomerGroupEntityTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\PriceProductTransfer $priceProductTransfer
     *
     * @return \Generated\Shared\Transfer\PriceProductTransfer
     */
    protected function persistPriceProductStore(PriceProductTransfer $priceProductTransfer): PriceProductTransfer
    {
        return $this->priceProductFacade->persistPriceProductStore($priceProductTransfer);
    }
}
