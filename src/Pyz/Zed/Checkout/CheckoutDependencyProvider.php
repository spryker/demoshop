<?php

namespace Pyz\Zed\Checkout;

use Spryker\Zed\Payolution\Communication\Plugin\Checkout\OrderHydrationPlugin;
use Spryker\Zed\Payolution\Communication\Plugin\Checkout\PreCheckPlugin;
use Spryker\Zed\Payolution\Communication\Plugin\Checkout\SaveOrderPlugin;
use Spryker\Zed\ShipmentCheckoutConnector\Communication\Plugin\OrderShipmentSavePlugin;
use Spryker\Zed\DiscountCheckoutConnector\Communication\Plugin\DiscountOrderSavePlugin;
use Spryker\Zed\SalesCheckoutConnector\Communication\Plugin\SalesOrderSaverPlugin;
use Spryker\Zed\CustomerCheckoutConnector\Communication\Plugin\OrderCustomerSavePlugin;
use Spryker\Zed\DiscountCheckoutConnector\Communication\Plugin\DiscountOrderHydrationPlugin;
use Spryker\Zed\ShipmentCheckoutConnector\Communication\Plugin\OrderShipmentHydrationPlugin;
use Spryker\Zed\OmsCheckoutConnector\Communication\Plugin\OrderOmsHydrationPlugin;
use Spryker\Zed\ItemGrouperCheckoutConnector\Communication\Plugin\OrderItemGroupingHydrationPlugin;
use Spryker\Zed\ProductOptionCheckoutConnector\Communication\Plugin\GroupKeyProductOptionHydrationPlugin;
use Spryker\Zed\CartCheckoutConnector\Communication\Plugin\ProductSkuGroupKeyHydrationPlugin;
use Spryker\Zed\ProductOptionCheckoutConnector\Communication\Plugin\OrderProductOptionHydrationPlugin;
use Spryker\Zed\CartCheckoutConnector\Communication\Plugin\OrderCartHydrationPlugin;
use Spryker\Zed\CustomerCheckoutConnector\Communication\Plugin\OrderCustomerHydrationPlugin;
use Spryker\Zed\CalculationCheckoutConnector\Communication\Plugin\Recalculate;
use Spryker\Zed\AvailabilityCheckoutConnector\Communication\Plugin\ProductsAvailablePreConditionPlugin;
use Spryker\Zed\CustomerCheckoutConnector\Communication\Plugin\CustomerPreConditionCheckerPlugin;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Checkout\CheckoutDependencyProvider as SprykerCheckoutDependencyProvider;
use Spryker\Zed\Checkout\Dependency\Plugin\CheckoutOrderHydrationInterface;
use Spryker\Zed\Checkout\Dependency\Plugin\CheckoutPostSaveHookInterface;
use Spryker\Zed\Checkout\Dependency\Plugin\CheckoutPreConditionInterface;
use Spryker\Zed\Checkout\Dependency\Plugin\CheckoutPreHydrationInterface;
use Spryker\Zed\Checkout\Dependency\Plugin\CheckoutSaveOrderInterface;

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
