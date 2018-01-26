<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\CmsContentWidgetProductSearchConnector\Plugin;

use Spryker\Yves\CmsContentWidgetProductSearchConnector\Plugin\CmsProductSearchContentWidgetPlugin as SprykerCmsProductSearchContentWidgetPlugin;

/**
 * @method \Pyz\Yves\CmsContentWidgetProductSearchConnector\CmsContentWidgetProductSearchConnectorFactory getFactory()
 */
class CmsProductSearchWidgetPlugin extends SprykerCmsProductSearchContentWidgetPlugin
{
    /**
     * {@inheritdoc}
     */
    protected function hydrateProductStorageTransfer(array $productData)
    {
        return $this->getFactory()
            ->getStorageProductMapperPlugin()
            ->mapStorageProduct($productData, []);
    }
}
