<?php

declare(strict_types = 1);

namespace ValanticSpryker\Client\PriceProductCustomerGroup\Plugin;

use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Client\Customer\Dependency\Plugin\CustomerSessionSetPluginInterface;
use Spryker\Client\Kernel\AbstractPlugin;

/**
 * @method \ValanticSpryker\Client\PriceProductCustomerGroup\PriceProductCustomerGroupFactory getFactory()
 */
class CustomerChangePriceUpdatePlugin extends AbstractPlugin implements CustomerSessionSetPluginInterface
{
    /**
     * @deprecated Use this plugin only if Yves cart controller doesn't reload the items already.
     *
     * Specification:
     * - Reloads cart items when logged in customer is assigned to CustomerGroup.
     *
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return void
     */
    public function execute(CustomerTransfer $customerTransfer): void
    {
        if ($customerTransfer->getCustomerGroup()) {
            $this->getFactory()
                ->getCartClient()
                ->reloadItems();
        }
    }
}
