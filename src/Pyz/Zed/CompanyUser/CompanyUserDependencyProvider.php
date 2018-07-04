<?php

namespace Pyz\Zed\Customer;

use Spryker\Zed\CompanyUser\Communication\Plugin\Customer\CustomerTransferCompanyUserExpanderPlugin;
use Spryker\Zed\Customer\CustomerDependencyProvider as SprykerCustomerDependencyProvider;

class CustomerDependencyProvider extends SprykerCustomerDependencyProvider
{

    /**
     * @return \Spryker\Zed\Customer\Dependency\Plugin\CustomerTransferExpanderPluginInterface[]
     */
    protected function getCustomerTransferExpanderPlugins()
    {
        return [
            new CustomerTransferCompanyUserExpanderPlugin()
        ];
    }
}