<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CompanyUnitAddressGui;

use Spryker\Zed\CompanyUnitAddressGui\CompanyUnitAddressGuiDependencyProvider as SprykerCompanyUnitAddressGuiDependencyProvider;
use Spryker\Zed\CompanyUnitAddressLabel\Communication\Plugin\EditCompanyUnitAddressFormExpanderPlugin;

class CompanyUnitAddressGuiDependencyProvider extends SprykerCompanyUnitAddressGuiDependencyProvider
{
    /**
     * @return \Spryker\Zed\CompanyUnitAddressGuiExtension\Communication\Plugin\EditCompanyUnitAddressFormExpanderPluginInterface[]
     */
    protected function getCompanyUnitAddressFromPlugins(): array
    {
        return [
            new EditCompanyUnitAddressFormExpanderPlugin(),
        ];
    }
}
