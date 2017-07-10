<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductLabel;

use Spryker\Zed\ProductLabel\ProductLabelDependencyProvider as SprykerProductLabelDependencyProvider;
use Spryker\Zed\ProductNew\Communication\Plugin\ProductNewLabelUpdaterPlugin;

class ProductLabelDependencyProvider extends SprykerProductLabelDependencyProvider
{

    /**
     * @return \Spryker\Zed\ProductLabel\Dependency\Plugin\ProductLabelRelationUpdaterPluginInterface[]
     */
    protected function getProductLabelRelationUpdaterPlugins()
    {
        return [
            new ProductNewLabelUpdaterPlugin(),
        ];
    }

}
