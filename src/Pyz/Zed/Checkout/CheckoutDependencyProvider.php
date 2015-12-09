<?php

namespace Pyz\Zed\Checkout;

use SprykerFeature\Zed\Payolution\Communication\Plugin\Checkout\OrderHydrationPlugin;
use SprykerFeature\Zed\Payolution\Communication\Plugin\Checkout\PreCheckPlugin;
use SprykerFeature\Zed\Payolution\Communication\Plugin\Checkout\SaveOrderPlugin;
use SprykerFeature\Zed\ShipmentCheckoutConnector\Communication\Plugin\OrderShipmentSavePlugin;
use SprykerFeature\Zed\DiscountCheckoutConnector\Communication\Plugin\DiscountOrderSavePlugin;
use SprykerFeature\Zed\SalesCheckoutConnector\Communication\Plugin\SalesOrderSaverPlugin;
use SprykerFeature\Zed\CustomerCheckoutConnector\Communication\Plugin\OrderCustomerSavePlugin;
use SprykerFeature\Zed\DiscountCheckoutConnector\Communication\Plugin\DiscountOrderHydrationPlugin;
use SprykerFeature\Zed\ShipmentCheckoutConnector\Communication\Plugin\OrderShipmentHydrationPlugin;
use SprykerFeature\Zed\OmsCheckoutConnector\Communication\Plugin\OrderOmsHydrationPlugin;
use SprykerFeature\Zed\ItemGrouperCheckoutConnector\Communication\Plugin\OrderItemGroupingHydrationPlugin;
use SprykerFeature\Zed\ProductOptionCheckoutConnector\Communication\Plugin\GroupKeyProductOptionHydrationPlugin;
use SprykerFeature\Zed\CartCheckoutConnector\Communication\Plugin\ProductSkuGroupKeyHydrationPlugin;
use SprykerFeature\Zed\ProductOptionCheckoutConnector\Communication\Plugin\OrderProductOptionHydrationPlugin;
use SprykerFeature\Zed\CartCheckoutConnector\Communication\Plugin\OrderCartHydrationPlugin;
use SprykerFeature\Zed\CustomerCheckoutConnector\Communication\Plugin\OrderCustomerHydrationPlugin;
use SprykerFeature\Zed\CalculationCheckoutConnector\Communication\Plugin\Recalculate;
use SprykerFeature\Zed\AvailabilityCheckoutConnector\Communication\Plugin\ProductsAvailablePreConditionPlugin;
use SprykerFeature\Zed\CustomerCheckoutConnector\Communication\Plugin\CustomerPreConditionCheckerPlugin;
use SprykerEngine\Zed\Kernel\Container;
use SprykerFeature\Zed\Checkout\CheckoutDependencyProvider as SprykerCheckoutDependencyProvider;
use SprykerFeature\Zed\Checkout\Dependency\Plugin\CheckoutOrderHydrationInterface;
use SprykerFeature\Zed\Checkout\Dependency\Plugin\CheckoutPostSaveHookInterface;
use SprykerFeature\Zed\Checkout\Dependency\Plugin\CheckoutPreConditionInterface;
use SprykerFeature\Zed\Checkout\Dependency\Plugin\CheckoutPreHydrationInterface;
use SprykerFeature\Zed\Checkout\Dependency\Plugin\CheckoutSaveOrderInterface;

class CheckoutDependencyProvider extends SprykerCheckoutDependencyProvider
{

    /**
     * @param Container $container
     *
     * @return CheckoutPreConditionInterface[]
     */
    protected function getCheckoutPreConditions(Container $container)
    {
        return [
            new CustomerPreConditionCheckerPlugin(),
            new ProductsAvailablePreConditionPlugin(),
            new PreCheckPlugin(),
        ];
    }

    /**
     * @param Container $container
     *
     * @return CheckoutPreHydrationInterface[]
     */
    protected function getCheckoutPreHydrator(Container $container)
    {
        $preHydrator = parent::getCheckoutPreHydrator($container);
        $preHydrator[] = new Recalculate();

        return $preHydrator;
    }

    /**
     * @param Container $container
     *
     * @return CheckoutOrderHydrationInterface[]
     */
    protected function getCheckoutOrderHydrators(Container $container)
    {
        return [
            new OrderCustomerHydrationPlugin(),
            new OrderCartHydrationPlugin(),
            new OrderProductOptionHydrationPlugin(),
            new ProductSkuGroupKeyHydrationPlugin(),
            new GroupKeyProductOptionHydrationPlugin(),
            new OrderItemGroupingHydrationPlugin(),
            new OrderOmsHydrationPlugin(),
            new OrderShipmentHydrationPlugin(),
            new DiscountOrderHydrationPlugin(),
            new OrderHydrationPlugin(),
        ];
    }

    /**
     * @param Container $container
     *
     * @return CheckoutSaveOrderInterface[]
     */
    protected function getCheckoutOrderSavers(Container $container)
    {
        return [
            new OrderCustomerSavePlugin(),
            new SalesOrderSaverPlugin(),
            new DiscountOrderSavePlugin(),
            new OrderShipmentSavePlugin(),
            new SaveOrderPlugin(),
        ];
    }

    /**
     * @param Container $container
     *
     * @return CheckoutPostSaveHookInterface[]
     */
    protected function getCheckoutPostHooks(Container $container)
    {
        return parent::getCheckoutPostHooks($container);
    }

}
