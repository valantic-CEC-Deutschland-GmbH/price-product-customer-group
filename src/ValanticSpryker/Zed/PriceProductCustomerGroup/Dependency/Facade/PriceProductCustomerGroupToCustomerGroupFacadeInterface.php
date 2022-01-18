<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\PriceProductCustomerGroup\Dependency\Facade;

interface PriceProductCustomerGroupToCustomerGroupFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerGroupTransfer $customerGroupTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerGroupTransfer
     */
    public function getMerchantRelationshipById(CustomerGroupTransfer $customerGroupTransfer): CustomerGroupTransfer;
}
