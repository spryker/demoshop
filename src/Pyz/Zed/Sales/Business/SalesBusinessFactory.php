<?php

namespace Pyz\Zed\Sales\Business;

use Pyz\Zed\Sales\Business\Model\CustomerOrderReader;
use Spryker\Zed\Sales\Business\SalesBusinessFactory as SprykerSalesBusinessFactory;

/**
 * @method \Pyz\Zed\Sales\SalesConfig getConfig()
 */
class SalesBusinessFactory extends SprykerSalesBusinessFactory
{

    /**
     * @return \Pyz\Zed\Sales\Business\Model\CustomerOrderReader
     */
    public function createCustomerOrderReader()
    {
        return new CustomerOrderReader(
            $this->getQueryContainer(),
            $this->getSalesAggregator(),
            $this->createOrderHydrator()
        );
    }

}
