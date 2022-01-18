<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\PriceProductCustomerGroup\Dependency;

interface PriceProductCustomerGroupEvents
{
    /**
     * Specification:
     * - This event will be used for vsy_price_product_customer_group entity creation
     *
     * @api
     *
     * @var string
     */
    public const ENTITY_VSY_PRICE_PRODUCT_CUSTOMER_GROUP_CREATE = 'Entity.vsy_price_product_customer_group.create';

    /**
     * Specification:
     * - This event will be used for vsy_price_product_customer_group entity update
     *
     * @api
     *
     * @var string
     */
    public const ENTITY_VSY_PRICE_PRODUCT_CUSTOMER_GROUP_UPDATE = 'Entity.vsy_price_product_customer_group.update';

    /**
     * Specification:
     * - This event will be used for vsy_price_product_customer_group entity delete
     *
     * @api
     *
     * @var string
     */
    public const ENTITY_VSY_PRICE_PRODUCT_CUSTOMER_GROUP_DELETE = 'Entity.vsy_price_product_customer_group.delete';

    /**
     * Specification:
     * - This event will be used for price_abstract publishing
     *
     * @api
     *
     * @var string
     */
    public const PRICE_ABSTRACT_PUBLISH = 'Price.price_abstract.publish';

    /**
     * Specification:
     * - This event will be used for price_abstract un-publishing
     *
     * @api
     *
     * @var string
     */
    public const PRICE_ABSTRACT_UNPUBLISH = 'Price.price_abstract.unpublish';

    /**
     * Specification:
     * - This event will be used for price_concrete publishing
     *
     * @api
     *
     * @var string
     */
    public const PRICE_CONCRETE_PUBLISH = 'Price.price_concrete.publish';

    /**
     * Specification:
     * - This event will be used for price_concrete un-publishing
     *
     * @api
     *
     * @var string
     */
    public const PRICE_CONCRETE_UNPUBLISH = 'Price.price_concrete.unpublish';

    /**
     * Specification:
     * - This event will be used for spy_price_product entity creation
     *
     * @api
     *
     * @var string
     */
    public const ENTITY_SPY_PRICE_PRODUCT_CREATE = 'Entity.spy_price_product.create';

    /**
     * Specification:
     * - This event will be used for spy_price_product entity changes
     *
     * @api
     *
     * @var string
     */
    public const ENTITY_SPY_PRICE_PRODUCT_UPDATE = 'Entity.spy_price_product.update';

    /**
     * Specification:
     * - This event will be used for spy_price_product entity deletion
     *
     * @api
     *
     * @var string
     */
    public const ENTITY_SPY_PRICE_PRODUCT_DELETE = 'Entity.spy_price_product.delete';

    /**
     * Specification:
     * - This event will be use:d for spy_price_product_store entity creation
     *
     * @api
     *
     * @var string
     */
    public const ENTITY_SPY_PRICE_PRODUCT_STORE_CREATE = 'Entity.spy_price_product_store.create';

    /**
     * Specification:
     * - This event will be used for spy_price_product_store entity changes
     *
     * @api
     *
     * @var string
     */
    public const ENTITY_SPY_PRICE_PRODUCT_STORE_UPDATE = 'Entity.spy_price_product_store.update';

    /**
     * Specification:
     * - This event will be used for spy_price_product_store entity deletion
     *
     * @api
     *
     * @var string
     */
    public const ENTITY_SPY_PRICE_PRODUCT_STORE_DELETE = 'Entity.spy_price_product_store.delete';
}
