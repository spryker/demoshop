<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CompanyBusinessUnitGui;

use Spryker\Zed\CompanyBusinessUnitGui\CompanyBusinessUnitGuiDependencyProvider as SprykerCompanyBusinessUnitGuiDependencyProvider;
use Spryker\Zed\CompanyUnitAddressGui\Communication\Plugin\CompanyBusinessUnitAddressFieldPlugin;

class CompanyBusinessUnitGuiDependencyProvider extends SprykerCompanyBusinessUnitGuiDependencyProvider
{
    /**
     * @return \Spryker\Zed\CompanyBusinessUnitGuiExtension\Communication\Plugin\CompanyBusinessUnitFormExpanderPluginInterface[]
     */
    protected function getCompanyBusinessUnitEditFormExpanderPlugins(): array
    {
        return [
            new CompanyBusinessUnitAddressFieldPlugin(),
        ];
    }
}
