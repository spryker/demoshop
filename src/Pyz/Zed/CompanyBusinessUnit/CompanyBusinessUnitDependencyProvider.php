<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CompanyBusinessUnit;

use Spryker\Zed\CompanyBusinessUnit\CompanyBusinessUnitDependencyProvider as SprykerCompanyBusinessUnitDependencyProvider;
use Spryker\Zed\CompanyUnitAddress\Communication\Plugin\CompanyBusinessUnitAddressSaverPlugin;

class CompanyBusinessUnitDependencyProvider extends SprykerCompanyBusinessUnitDependencyProvider
{
    /**
     * @return \Spryker\Zed\CompanyBusinessUnitExtension\Dependency\Plugin\CompanyBusinessUnitPostSavePluginInterface[]
     */
    protected function getCompanyBusinessUnitPostSavePlugins(): array
    {
        return [
            new CompanyBusinessUnitAddressSaverPlugin(),
        ];
    }
}
