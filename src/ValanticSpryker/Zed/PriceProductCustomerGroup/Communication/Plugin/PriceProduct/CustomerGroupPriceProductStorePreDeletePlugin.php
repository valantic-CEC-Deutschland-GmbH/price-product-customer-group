<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\PriceProductCustomerGroup\Communication\Plugin\PriceProduct;

use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\PriceProductExtension\Dependency\Plugin\PriceProductStorePreDeletePluginInterface;

/**
 * @method \ValanticSpryker\Zed\PriceProductCustomerGroup\Business\PriceProductCustomerGroupFacadeInterface getFacade()
 * @method \ValanticSpryker\Zed\PriceProductCustomerGroup\Communication\PriceProductCustomerGroupCommunicationFactory getFactory()
 * @method \ValanticSpryker\Zed\PriceProductCustomerGroup\PriceProductCustomerGroupConfig getConfig()
 */
class CustomerGroupPriceProductStorePreDeletePlugin extends AbstractPlugin implements PriceProductStorePreDeletePluginInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param int $idPriceProductStore
     *
     * @return void
     */
    public function preDelete(int $idPriceProductStore): void
    {
        $this->getFacade()
            ->deletePriceProductCustomerGroupByIdPriceProductStore($idPriceProductStore);
    }
}
