<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

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
            $this->createOrderHydrator()
        );
    }

}
