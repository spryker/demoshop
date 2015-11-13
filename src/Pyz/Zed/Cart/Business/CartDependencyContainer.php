<?php

namespace Pyz\Zed\Cart\Business;

use Pyz\Zed\Cart\CartDependencyProvider;
use SprykerFeature\Zed\Cart\Business\CartDependencyContainer as SpyCartDependencyContainer;
use SprykerFeature\Zed\Cart\Business\Operator\OperatorInterface;
use Pyz\Zed\Cart\Dependency\Plugin\OrderShipmentMethodInterface;

class CartDependencyContainer extends SpyCartDependencyContainer
{
    /**
     * @return OperatorInterface
     */
    public function createExpenseAddOperator()
    {
        return $this->configureCartOperator(
            $this->getFactory()->createOperatorExpenseAddOperator(
                $this->createStorageProvider(),
                $this->createCartCalculator(),
                $this->getItemGrouper()
            )
        );
    }

    /**
     * @return OrderShipmentMethodInterface
     */
    public function getShipmentPlugin()
    {
        return $this->getProvidedDependency(CartDependencyProvider::PLUGIN_CART_SHIPMENT);
    }

    /**
     * @param OperatorInterface $operator
     *
     * @return OperatorInterface
     */
    private function configureCartOperator(OperatorInterface $operator)
    {
        $bundleConfig = $this->getConfig();

        foreach ($bundleConfig->getCartItemPlugins() as $itemExpanderPlugin) {
            $operator->addItemExpanderPlugin($itemExpanderPlugin);
        }

        return $operator;
    }

}
