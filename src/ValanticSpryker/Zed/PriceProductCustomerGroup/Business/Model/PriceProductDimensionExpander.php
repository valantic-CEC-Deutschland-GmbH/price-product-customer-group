<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\PriceProductCustomerGroup\Business\Model;

use ValanticSpryker\Shared\PriceProductCustomerGroup\PriceProductCustomerGroupConfig;
use ValanticSpryker\Zed\PriceProductCustomerGroup\Dependency\Facade\PriceProductCustomerGroupToCustomerGroupFacadeInterface;

class PriceProductDimensionExpander implements PriceProductDimensionExpanderInterface
{
    /**
     * @var \ValanticSpryker\Zed\PriceProductCustomerGroup\Dependency\Facade\PriceProductCustomerGroupToCustomerGroupFacadeInterface
     */
    protected $customerGroupFacade;

    /**
     * @param \ValanticSpryker\Zed\PriceProductCustomerGroup\Dependency\Facade\PriceProductCustomerGroupToCustomerGroupFacadeInterface $customerGroupFacade
     */
    public function __construct(
        PriceProductCustomerGroupToCustomerGroupFacadeInterface $customerGroupFacade
    ) {
        $this->customerGroupFacade = $customerGroupFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\PriceProductDimensionTransfer $priceProductDimensionTransfer
     *
     * @return \Generated\Shared\Transfer\PriceProductDimensionTransfer
     */
    public function expand(PriceProductDimensionTransfer $priceProductDimensionTransfer): PriceProductDimensionTransfer
    {
        $customerGroupTransfer = (new CustomerGroupTransfer())
            ->setIdCustomerGroup($priceProductDimensionTransfer->getIdCustomerGroup());

        $customerGroupTransfer = $this->customerGroupFacade
            ->getCustomerGroupById($customerGroupTransfer);

        $priceProductDimensionTransfer->setType(PriceProductCustomerGroupConfig::PRICE_DIMENSION_CUSTOMER_GROUP);
        $priceProductDimensionTransfer->setName($customerGroupTransfer->getName());

        return $priceProductDimensionTransfer;
    }
}
