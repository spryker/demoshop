<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\CmsContentWidgetProductConnector\Plugin;

use Spryker\Yves\CmsContentWidgetProductConnector\Plugin\CmsProductContentWidgetPlugin as SprykerCmsProductContentWidgetPlugin;

/**
 * @method \Pyz\Yves\CmsContentWidgetProductConnector\CmsContentWidgetProductConnectorFactory getFactory()
 */
class CmsProductContentWidgetPlugin extends SprykerCmsProductContentWidgetPlugin
{
    /**
     * @param array $productData
     *
     * @return \Generated\Shared\Transfer\StorageProductTransfer
     */
    protected function mapProductStorageTransfer(array $productData)
    {
        return $this->getFactory()
            ->getStorageProductMapperPlugin()
            ->mapStorageProduct($productData, []);
    }
}
