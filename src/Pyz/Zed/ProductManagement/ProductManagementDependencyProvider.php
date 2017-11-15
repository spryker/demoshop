<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductManagement;

use Spryker\Zed\CmsBlockProductConnector\Communication\Plugin\CmsBlockProductAbstractBlockListViewPlugin;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Money\Communication\Plugin\Form\MoneyCollectionFormTypePlugin;
use Spryker\Zed\Money\Communication\Plugin\Form\MoneyFormTypePlugin;
use Spryker\Zed\ProductManagement\ProductManagementDependencyProvider as SprykerProductManagementDependencyProvider;

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
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Money\Communication\Plugin\Form\MoneyFormTypePlugin
     */
    protected function createMoneyFormTypePlugin(Container $container)
    {
        return new MoneyFormTypePlugin();
    }
}
