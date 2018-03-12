<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductManagement;

use Spryker\Zed\CmsBlockProductConnector\Communication\Plugin\CmsBlockProductAbstractBlockListViewPlugin;
use Spryker\Zed\CompanySupplierGui\Communication\Plugin\ProductConcreteEditFormExpanderPlugin;
use Spryker\Zed\CompanySupplierGui\Communication\Plugin\ProductConcreteFormEditDataProviderExpanderPlugin;
use Spryker\Zed\CompanySupplierGui\Communication\Plugin\ProductFormTransferMapperExpanderPlugin;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Money\Communication\Plugin\Form\MoneyFormTypePlugin;
use Spryker\Zed\ProductManagement\ProductManagementDependencyProvider as SprykerProductManagementDependencyProvider;
use Spryker\Zed\ProductManagementExtension\Dependency\Plugin\ProductConcreteEditFormExpanderPluginInterface;
use Spryker\Zed\ProductManagementExtension\Dependency\Plugin\ProductConcreteFormEditDataProviderExpanderPluginInterface;
use Spryker\Zed\Store\Communication\Plugin\Form\StoreRelationToggleFormTypePlugin;

class ProductManagementDependencyProvider extends SprykerProductManagementDependencyProvider
{
    /**
     * @return \Spryker\Zed\ProductManagement\Communication\Plugin\ProductAbstractViewPluginInterface[]
     */
    protected function getProductAbstractViewPlugins()
    {
        return [
            new CmsBlockProductAbstractBlockListViewPlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\Kernel\Communication\Form\FormTypeInterface
     */
    protected function getStoreRelationFormTypePlugin()
    {
        return new StoreRelationToggleFormTypePlugin();
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Money\Communication\Plugin\Form\MoneyFormTypePlugin
     */
    protected function createMoneyFormTypePlugin(Container $container)
    {
        return new MoneyFormTypePlugin();
    }

    /**
     * @return ProductConcreteEditFormExpanderPluginInterface[]
     */
    protected function getProductConcreteEditFormExpanderPlugins(): array
    {
        return [
            new ProductConcreteEditFormExpanderPlugin(),
        ];
    }

    /**
     * @return ProductConcreteFormEditDataProviderExpanderPluginInterface[]
     */
    protected function getProductConcreteFormEditDataProviderExpanderPlugins(): array
    {
        return [
            new ProductConcreteFormEditDataProviderExpanderPlugin(),
        ];
    }

    /**
     * @return ProductConcreteFormEditDataProviderExpanderPluginInterface[]
     */
    protected function getProductFormTransferMapperExpanderPlugins(): array
    {
        return [
            new ProductFormTransferMapperExpanderPlugin(),
        ];
    }
}
