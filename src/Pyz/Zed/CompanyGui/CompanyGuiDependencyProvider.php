<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CompanyGui;

use Spryker\Zed\CompanyGui\CompanyGuiDependencyProvider as SprykerCompanyGuiDependencyProvider;
use Spryker\Zed\CompanySupplierGui\Communication\Plugin\CompanyTableActionViewSupplier;
use Spryker\Zed\CompanySupplierGui\Communication\Plugin\CompanyTableCompanyTypePlugin;
use Spryker\Zed\CompanySupplierGui\Communication\Plugin\CompanyTypeFieldPlugin;

class CompanyGuiDependencyProvider extends SprykerCompanyGuiDependencyProvider
{
    /**
     * @return \Spryker\Zed\CompanyGuiExtension\Dependency\Plugin\CompanyTableActionExpanderInterface[]
     */
    protected function getCompanyTableActionExpanderPlugins(): array
    {
        return [
            new CompanyTableActionViewSupplier(),
        ];
    }

    /**
     * @return \Spryker\Zed\CompanyGuiExtension\Dependency\Plugin\CompanyTableExpanderInterface[]
     */
    protected function getCompanyTableExpanderPlugins(): array
    {
        return [
            new CompanyTableCompanyTypePlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\CompanyGuiExtension\Dependency\Plugin\CompanyFormExpanderPluginInterface[]
     */
    protected function getCompanyFormPlugins(): array
    {
        return [
            new CompanyTypeFieldPlugin(),
        ];
    }
}
