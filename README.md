# Customer Group Based Prices

[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.3-8892BF.svg)](https://php.net/)

Module containing database schema and required plugins for specific product prices per customer group.

### Install package
```
composer req valantic-spryker/price-product-customer-group
```

### Update shared config
`config/Shared/config_default.php`

```
$config[KernelConstants::CORE_NAMESPACES] = [
    ...
    'ValanticSpryker',
];
```

### Register plugins
`src/Pyz/Zed/PriceProduct/PriceProductDependencyProvider.php`

```
...

use ValanticSpryker\Zed\PriceProductCustomerGroup\Communication\Plugin\PriceProduct\CustomerGroupPriceDimensionAbstractWriterPlugin;
use ValanticSpryker\Zed\PriceProductCustomerGroup\Communication\Plugin\PriceProduct\CustomerGroupPriceDimensionConcreteWriterPlugin;
use ValanticSpryker\Zed\PriceProductCustomerGroup\Communication\Plugin\PriceProduct\CustomerGroupPriceProductDimensionExpanderStrategyPlugin;
use ValanticSpryker\Zed\PriceProductCustomerGroup\Communication\Plugin\PriceProduct\CustomerGroupPriceProductStorePreDeletePlugin;
use ValanticSpryker\Zed\PriceProductCustomerGroup\Communication\Plugin\PriceProduct\CustomerGroupPriceQueryCriteriaPlugin;

...

 protected function getPriceDimensionQueryCriteriaPlugins(): array
 {
    return array_merge(parent::getPriceDimensionQueryCriteriaPlugins(), [
        ...
        new CustomerGroupPriceQueryCriteriaPlugin(),
    ]);
 }

...

protected function getPriceProductStorePreDeletePlugins(): array
{
    return [
        ...
        new CustomerGroupPriceProductStorePreDeletePlugin(),
    ];
}

...

protected function getPriceProductDimensionExpanderStrategyPlugins(): array
{
    return [
        ...
        new CustomerGroupPriceProductDimensionExpanderStrategyPlugin(),
    ];
}

...

protected function getPriceDimensionConcreteSaverPlugins(): array
{
    return [
        ...
        new CustomerGroupPriceDimensionConcreteWriterPlugin(),
    ];
}

...

protected function getPriceDimensionAbstractSaverPlugins(): array
{
    return [
        ...
        new CustomerGroupPriceDimensionAbstractWriterPlugin(),
    ];
}
```

`src/Pyz/Zed/Console/ConsoleDependencyProvider.php`
```
...
use ValanticSpryker\Zed\PriceProductCustomerGroup\Communication\Console\PriceProductCustomerGroupDeleteConsole;
...

protected function getConsoleCommands(Container $container): array
{
    $commands = [
        ...
        new PriceProductCustomerGroupDeleteConsole(),
    ];
}
```

`src/Pyz/Service/PriceProduct/PriceProductDependencyProvider.php`
```
...
use ValanticSpryker\Service\PriceProductCustomerGroup\Plugin\PriceProduct\CustomerGroupPriceProductFilterPlugin;
...

protected function getPriceProductDecisionPlugins(): array
{
    return array_merge([
        ...
        new CustomerGroupPriceProductFilterPlugin(),
    ], parent::getPriceProductDecisionPlugins());
}
```

### See also
Integration of price product customer group connector: https://gitlab.nxs360.com/packages/php/spryker/price-product-customer-group-connector
