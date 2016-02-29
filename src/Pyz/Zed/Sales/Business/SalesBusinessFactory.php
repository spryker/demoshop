<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Sales\Business;

use Pyz\Zed\Sales\Business\Model\OrderManager;
use Spryker\Zed\Sales\Business\SalesBusinessFactory as SprykerSalesBusinessFactory;
use Spryker\Zed\Sales\SalesDependencyProvider;

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
            $this->createReferenceGenerator()
        );
    }

}
