<?php

namespace Pyz\Zed\Sales\Business;

use Pyz\Zed\Sales\Business\Model\OrderManager;
use Spryker\Zed\Sales\Business\SalesBusinessFactory as SprykerSalesBusinessFactory;
use Spryker\Zed\Sales\SalesDependencyProvider;

class SalesBusinessFactory extends SprykerSalesBusinessFactory
{

    /**
     * @return OrderManager
     */
    public function createOrderManager()
    {
        return new OrderManager(
            $this->getQueryContainer(),
            $this->getProvidedDependency(SalesDependencyProvider::FACADE_COUNTRY),
            $this->getProvidedDependency(SalesDependencyProvider::FACADE_OMS),
            $this->createReferenceGenerator()
        );
    }

}
