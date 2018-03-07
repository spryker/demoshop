<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CompanyUnitAddress;

use Spryker\Zed\CompanyUnitAddress\CompanyUnitAddressDependencyProvider as SprykerCompanyUnitAddressDependencyProvider;
use Spryker\Zed\CompanyUnitAddressLabel\Communication\Plugin\CompanyUnitAddressPreUpdatePlugin;
use Spryker\Zed\CompanyUnitAddressLabel\Communication\Plugin\CompanyUnitAddressTransferHydratorPlugin;
use Spryker\Zed\Kernel\Container;

class CompanyUnitAddressDependencyProvider extends SprykerCompanyUnitAddressDependencyProvider
{
    public const PLUGIN_ADDRESS_POST_UPDATE = 'PLUGIN_ADDRESS_POST_UPDATE';

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
     * @return \Spryker\Zed\CompanyUnitAddressExtension\Communication\Plugin\CompanyUnitAddressPreUpdatePluginInterface[]
     */
    protected function getAddressPreUpdatePlugins(): array
    {
        return [
            new CompanyUnitAddressPreUpdatePlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\CompanyUnitAddressExtension\Communication\Plugin\CompanyUnitAddressTransferHydratorPluginInterface[]
     */
    protected function getAddressTransferHydratorPlugins(): array
    {
        return [
            new CompanyUnitAddressTransferHydratorPlugin(),
        ];
    }
}
