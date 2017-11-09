<?php

namespace Pyz\Zed\CustomerGroup\Business;

use Pyz\Zed\CustomerGroup\Business\Model\CustomerGroup;
use Spryker\Zed\CustomerGroup\Business\CustomerGroupBusinessFactory as BaseCustomerGroupBusinessFactory;

class CustomerGroupBusinessFactory extends BaseCustomerGroupBusinessFactory
{
    /**
     * @return \Spryker\Zed\CustomerGroup\Business\Model\CustomerGroupInterface
     */
    public function createCustomerGroup()
    {
        return new CustomerGroup($this->getQueryContainer());
    }
}
