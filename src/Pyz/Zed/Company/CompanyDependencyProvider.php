<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Company;

use Spryker\Zed\Company\CompanyDependencyProvider as SprykerCompanyDependencyProvider;
use Spryker\Zed\CompanyBusinessUnit\Communication\Plugin\Company\CompanyBusinessUnitCreatePlugin;
use Spryker\Zed\CompanyMailConnector\Communication\Plugin\Company\SendCompanyStatusChangePlugin;
use Spryker\Zed\CompanyRole\Communication\Plugin\CompanyRoleCreatePlugin;
use Spryker\Zed\CompanyUser\Communication\Plugin\Company\CompanyUserCreatePlugin;

class CompanyDependencyProvider extends SprykerCompanyDependencyProvider
{
    /**
     * @return \Spryker\Zed\CompanyExtension\Dependency\Plugin\CompanyPostCreatePluginInterface[]
     */
    protected function getCompanyPostCreatePlugins(): array
    {
        return [
            new CompanyBusinessUnitCreatePlugin(),
            new CompanyRoleCreatePlugin(),
            new CompanyUserCreatePlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\CompanyExtension\Dependency\Plugin\CompanyPostSavePluginInterface[]
     */
    protected function getCompanyPostSavePlugins(): array
    {
        return [
            new SendCompanyStatusChangePlugin(),
        ];
    }
}
