<?php
namespace Pyz\Zed\CompanyUser;

use Spryker\Zed\CompanyBusinessUnit\Communication\Plugin\CompanyUser\AssignDefaultBusinessUnitToCompanyUserPlugin;
use Spryker\Zed\CompanyBusinessUnit\Communication\Plugin\CompanyUser\CompanyBusinessUnitHydratePlugin;
use Spryker\Zed\CompanyRole\Communication\Plugin\CompanyUser\AssignDefaultCompanyUserRolePlugin;
use Spryker\Zed\CompanyUser\CompanyUserDependencyProvider as SprykerCompanyUserDependencyProvider;

class CompanyUserDependencyProvider extends SprykerCompanyUserDependencyProvider
{

    /**
     * @return \Spryker\Zed\CompanyUserExtension\Dependency\Plugin\CompanyUserPreSavePluginInterface[]
     */
    protected function getCompanyUserPreSavePlugins(): array
    {
        return [
            new AssignDefaultBusinessUnitToCompanyUserPlugin()
        ];
    }

    /**
     * @return \Spryker\Zed\CompanyUserExtension\Dependency\Plugin\CompanyUserPostSavePluginInterface[]
     */
    protected function getCompanyUserPostSavePlugins(): array
    {
        return [];
    }

    /**
     * @return \Spryker\Zed\CompanyUserExtension\Dependency\Plugin\CompanyUserHydrationPluginInterface[]
     */
    protected function getCompanyUserHydrationPlugins(): array
    {
        return [
            new CompanyBusinessUnitHydratePlugin()
        ];
    }

    /**
     * @return \Spryker\Zed\CompanyUserExtension\Dependency\Plugin\CompanyUserPostCreatePluginInterface[]
     */
    protected function getCompanyUserPostCreatePlugins(): array
    {
        return [
            new AssignDefaultCompanyUserRolePlugin
        ];
    }

}