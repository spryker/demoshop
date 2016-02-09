<?php

namespace Pyz\Zed\Checkout;

use Spryker\Zed\Availability\Communication\Plugin\ProductsAvailableCheckoutPreConditionPlugin;
use Spryker\Zed\Customer\Communication\Plugin\CustomerPreConditionCheckerPlugin;
use Spryker\Zed\Customer\Communication\Plugin\OrderCustomerSavePlugin;
use Spryker\Zed\Discount\Communication\Plugin\DiscountOrderSavePlugin;
use Spryker\Zed\Shipment\Communication\Plugin\OrderShipmentSavePlugin;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Checkout\CheckoutDependencyProvider as SprykerCheckoutDependencyProvider;
use Spryker\Zed\Checkout\Dependency\Plugin\CheckoutPostSaveHookInterface;
use Spryker\Zed\Checkout\Dependency\Plugin\CheckoutPreConditionInterface;
use Spryker\Zed\Checkout\Dependency\Plugin\CheckoutSaveOrderInterface;
use Spryker\Zed\Sales\Communication\Plugin\SalesOrderSaverPlugin;
use Spryker\Zed\ProductOption\Communication\Plugin\ProductOptionOrderSaverPlugin;
use Spryker\Zed\Payment\Communication\Plugin\Checkout\PaymentPreCheckPlugin;
use Spryker\Zed\Payment\Communication\Plugin\Checkout\PaymentSaverPlugin;

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
            new ProductsAvailableCheckoutPreConditionPlugin(),
            new PaymentPreCheckPlugin(),
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
            new ProductOptionOrderSaverPlugin(),
            new DiscountOrderSavePlugin(),
            new OrderShipmentSavePlugin(),
            new PaymentSaverPlugin(),
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
