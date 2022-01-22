<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\PriceProductCustomerGroup;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;
use ValanticSpryker\Zed\PriceProductCustomerGroup\Dependency\Facade\PriceProductCustomerGroupToCustomerGroupFacadeBridge;
use ValanticSpryker\Zed\PriceProductCustomerGroup\Dependency\Facade\PriceProductCustomerGroupToPriceProductFacadeBridge;

class PriceProductCustomerGroupDependencyProvider extends AbstractBundleDependencyProvider
{
    /**
     * @var string
     */
    public const FACADE_PRICE_PRODUCT = 'FACADE_PRICE_PRODUCT';

    /**
     * @var string
     */
    public const FACADE_CUSTOMER_GROUP = 'FACADE_CUSTOMER_GROUP';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container = $this->addPriceProductFacade($container);
        $container = $this->addCustomerGroupFacade($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addPriceProductFacade(Container $container): Container
    {
        $container->set(static::FACADE_PRICE_PRODUCT, function (Container $container) {
            return new PriceProductCustomerGroupToPriceProductFacadeBridge(
                $container->getLocator()->priceProduct()->facade(),
            );
        });

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addCustomerGroupFacade(Container $container)
    {
        $container->set(static::FACADE_CUSTOMER_GROUP, function (Container $container) {
            return new PriceProductCustomerGroupToCustomerGroupFacadeBridge(
                $container->getLocator()->customerGroup()->facade(),
            );
        });

        return $container;
    }
}
