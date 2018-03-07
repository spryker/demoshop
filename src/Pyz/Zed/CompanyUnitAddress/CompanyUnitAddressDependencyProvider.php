<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CompanyUnitAddress;

use Spryker\Zed\CompanyUnitAddress\CompanyUnitAddressDependencyProvider as SprykerCompanyUnitAddressDependencyProvider;
use Spryker\Zed\CompanyUnitAddressLabel\Communication\Plugin\CompanyUnitAddressHydratingPlugin;
use Spryker\Zed\CompanyUnitAddressLabel\Communication\Plugin\CompanyUnitAddressPostSavePlugin;
use Spryker\Zed\Kernel\Container;

class CompanyUnitAddressDependencyProvider extends SprykerCompanyUnitAddressDependencyProvider
{
    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container = $this->addAddressPostUpdatePlugins($container);

        return $container;
    }

    /**
     * @return \Spryker\Zed\CompanyUnitAddressExtension\Dependency\Plugin\CompanyUnitAddressPostSavePluginInterface[]
     */
    protected function getCompanyUnitAddressPostSavePlugins(): array
    {
        return [
            new CompanyUnitAddressPostSavePlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\CompanyUnitAddressExtension\Dependency\Plugin\CompanyUnitAddressHydratingPluginInterface[]
     */
    protected function getCompanyUnitAddressHydratingPlugins(): array
    {
        return [
            new CompanyUnitAddressHydratingPlugin(),
        ];
    }
}
