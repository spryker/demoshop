<?php

namespace Pyz\Zed\Checkout;

use SprykerEngine\Zed\Kernel\Container;
use SprykerFeature\Zed\Checkout\CheckoutDependencyProvider as SprykerCheckoutDependencyProvider;
use SprykerFeature\Zed\Checkout\Dependency\Plugin\CheckoutOrderHydrationInterface;
use SprykerFeature\Zed\Checkout\Dependency\Plugin\CheckoutPostSaveHookInterface;
use SprykerFeature\Zed\Checkout\Dependency\Plugin\CheckoutPreconditionInterface;
use SprykerFeature\Zed\Checkout\Dependency\Plugin\CheckoutPreHydrationInterface;
use SprykerFeature\Zed\Checkout\Dependency\Plugin\CheckoutSaveOrderInterface;

class CheckoutDependencyProvider extends SprykerCheckoutDependencyProvider
{

    /**
     * @param Container $container
     *
     * @return CheckoutPreconditionInterface[]
     */
    protected function getCheckoutPreconditions(Container $container)
    {
        return [
            $container->getLocator()->customerCheckoutConnector()->pluginCustomerPreconditionCheckerPlugin(),
            $container->getLocator()->availabilityCheckoutConnector()->pluginProductsAvailablePreconditionPlugin(),
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
        $preHydrator[] = $container->getLocator()->calculationCheckoutConnector()->pluginRecalculate();

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
            $container->getLocator()->customerCheckoutConnector()->pluginOrderCustomerHydrationPlugin(),
            $container->getLocator()->cartCheckoutConnector()->pluginOrderCartHydrationPlugin(),
            $container->getLocator()->productOptionCheckoutConnector()->pluginOrderProductOptionHydrationPlugin(),
            $container->getLocator()->cartCheckoutConnector()->pluginProductSkuGroupKeyHydrationPlugin(),
            $container->getLocator()->productOptionCheckoutConnector()->pluginGroupKeyProductOptionHydrationPlugin(),
            $container->getLocator()->itemGrouperCheckoutConnector()->pluginOrderItemGroupingHydrationPlugin(),
            $container->getLocator()->omsCheckoutConnector()->pluginOrderOmsHydrationPlugin(),
            $container->getLocator()->discountCheckoutConnector()->pluginDiscountOrderHydrationPlugin(),
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
            $container->getLocator()->salesCheckoutConnector()->pluginSalesOrderSaverPlugin(),
            $container->getLocator()->customerCheckoutConnector()->pluginOrderCustomerSavePlugin(),
            $container->getLocator()->discountCheckoutConnector()->pluginDiscountOrderSavePlugin(),
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
