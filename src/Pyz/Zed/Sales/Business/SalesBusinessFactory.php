<?php

namespace Pyz\Zed\Sales\Business;

use Pyz\Zed\Sales\Business\Model\OrderManager;
use Spryker\Zed\Sales\Business\SalesBusinessFactory as SprykerSalesBusinessFactory;
use Spryker\Zed\Sales\SalesDependencyProvider;
use Pyz\Zed\Sales\SalesConfig;

/**
 * @method \Pyz\Zed\Sales\SalesConfig getConfig()
 */
class SalesBusinessFactory extends SprykerSalesBusinessFactory
{

    /**
     * @return \Pyz\Zed\Sales\Business\Model\OrderManager
     */
    public function createOrderManager()
    {
        return new OrderManager(
            $this->getQueryContainer(),
            $this->getProvidedDependency(SalesDependencyProvider::FACADE_COUNTRY),
            $this->getProvidedDependency(SalesDependencyProvider::FACADE_OMS),
            $this->createReferenceGenerator(),
            $this->getConfig()
        );
    }

}
