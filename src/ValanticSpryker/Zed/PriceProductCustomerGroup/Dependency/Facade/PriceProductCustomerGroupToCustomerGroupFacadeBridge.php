<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\PriceProductCustomerGroup\Dependency\Facade;

use Spryker\Zed\CustomerGroup\Business\CustomerGroupFacadeInterface;
use ValanticSpryker\Zed\PriceProductCustomerGroupConnector\Dependency\Facade\PriceProductCustomerGroupConnectorToCustomerGroupFacadeInterface;

class PriceProductCustomerGroupToCustomerGroupFacadeBridge implements PriceProductCustomerGroupConnectorToCustomerGroupFacadeInterface
{
    /**
     * @var \Spryker\Zed\CustomerGroup\Business\CustomerGroupFacadeInterface
     */
    protected $customerGroupFacade;

    /**
     * @param \Spryker\Zed\CustomerGroup\Business\CustomerGroupFacadeInterface $customerGroupFacade
     */
    public function __construct(CustomerGroupFacadeInterface $customerGroupFacade)
    {
        $this->customerGroupFacade = $customerGroupFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerGroupTransfer $customerGroupTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerGroupTransfer
     */
    public function getCustomerGroupById(CustomerGroupTransfer $customerGroupTransfer): CustomerGroupTransfer
    {
        return $this->customerGroupFacade
            ->get($customerGroupTransfer);
    }
}
