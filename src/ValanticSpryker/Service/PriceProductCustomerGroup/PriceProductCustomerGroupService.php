<?php

declare(strict_types = 1);

namespace ValanticSpryker\Service\PriceProductCustomerGroup;

use Spryker\Service\Kernel\AbstractService;

/**
 * @method \ValanticSpryker\Service\PriceProductCustomerGroup\PriceProductCustomerGroupServiceFactory getFactory()
 */
class PriceProductCustomerGroupService extends AbstractService implements PriceProductCustomerGroupServiceInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param array<\Generated\Shared\Transfer\PriceProductTransfer> $priceProductTransfers
     * @param \Generated\Shared\Transfer\PriceProductFilterTransfer $priceProductFilterTransfer
     *
     * @return array<\Generated\Shared\Transfer\PriceProductTransfer>
     */
    public function filterPriceProductsByCustomerGroup(array $priceProductTransfers, PriceProductFilterTransfer $priceProductFilterTransfer): array
    {
        return $this->getFactory()
            ->createCustomerGroupPriceProductFilter()
            ->filterPriceProductsByCustomerGroup($priceProductTransfers, $priceProductFilterTransfer);
    }
}
