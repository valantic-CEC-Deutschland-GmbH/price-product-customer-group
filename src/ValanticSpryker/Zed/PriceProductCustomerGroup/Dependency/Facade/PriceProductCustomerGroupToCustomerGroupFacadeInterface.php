<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\PriceProductCustomerGroup\Dependency\Facade;

use Generated\Shared\Transfer\CustomerGroupTransfer;

interface PriceProductCustomerGroupToCustomerGroupFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerGroupTransfer $customerGroupTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerGroupTransfer
     */
    public function get(CustomerGroupTransfer $customerGroupTransfer): CustomerGroupTransfer;
}
