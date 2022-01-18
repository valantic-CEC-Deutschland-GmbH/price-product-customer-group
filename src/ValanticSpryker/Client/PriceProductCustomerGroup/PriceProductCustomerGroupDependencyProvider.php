<?php

declare(strict_types = 1);

namespace ValanticSpryker\Client\PriceProductCustomerGroup;

use Spryker\Client\Kernel\Container;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use ValanticSpryker\Client\PriceProductCustomerGroup\Dependency\Client\PriceProductCustomerGroupToCartClientBridge;

class PriceProductCustomerGroupDependencyProvider extends AbstractBundleDependencyProvider
{
    /**
     * @var string
     */
    public const CLIENT_CART = 'CLIENT_CART';

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    public function provideServiceLayerDependencies(Container $container): Container
    {
        $container = $this->addCartClient($container);

        return $container;
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    private function addCartClient(Container $container): Container
    {
        $container->set(static::CLIENT_CART, function (Container $container) {
            return new PriceProductCustomerGroupToCartClientBridge(
                $container->getLocator()->cart()->client(),
            );
        });

        return $container;
    }
}
