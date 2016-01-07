<?php

namespace Pyz\Zed\Checkout;

use Spryker\Zed\Payolution\Communication\Plugin\Checkout\PreCheckPlugin;
use Spryker\Zed\Payolution\Communication\Plugin\Checkout\SaveOrderPlugin;
use Spryker\Zed\ShipmentCheckoutConnector\Communication\Plugin\OrderShipmentSavePlugin;
use Spryker\Zed\DiscountCheckoutConnector\Communication\Plugin\DiscountOrderSavePlugin;
use Spryker\Zed\SalesCheckoutConnector\Communication\Plugin\SalesOrderSaverPlugin;
use Spryker\Zed\CustomerCheckoutConnector\Communication\Plugin\OrderCustomerSavePlugin;
use Spryker\Zed\AvailabilityCheckoutConnector\Communication\Plugin\ProductsAvailablePreConditionPlugin;
use Spryker\Zed\CustomerCheckoutConnector\Communication\Plugin\CustomerPreConditionCheckerPlugin;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Checkout\CheckoutDependencyProvider as SprykerCheckoutDependencyProvider;
use Spryker\Zed\Checkout\Dependency\Plugin\CheckoutPostSaveHookInterface;
use Spryker\Zed\Checkout\Dependency\Plugin\CheckoutPreConditionInterface;
use Spryker\Zed\Checkout\Dependency\Plugin\CheckoutSaveOrderInterface;

class CheckoutDependencyProvider extends SprykerCheckoutDependencyProvider
{

    /**
     * @param Container $container                                                                                          ’
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
