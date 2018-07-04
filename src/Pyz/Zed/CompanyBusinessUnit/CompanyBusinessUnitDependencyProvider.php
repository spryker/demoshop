<?php

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