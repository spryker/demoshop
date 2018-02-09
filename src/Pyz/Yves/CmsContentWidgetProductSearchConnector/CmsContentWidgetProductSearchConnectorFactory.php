<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\CmsContentWidgetProductSearchConnector;

use Spryker\Yves\CmsContentWidgetProductSearchConnector\CmsContentWidgetProductSearchConnectorFactory as SprykerCmsContentWidgetProductSearchConnectorFactory;

class CmsContentWidgetProductSearchConnectorFactory extends SprykerCmsContentWidgetProductSearchConnectorFactory
{
    /**
     * @return \Pyz\Yves\Product\Dependency\Plugin\StorageProductMapperPluginInterface
     */
    public function getStorageProductMapperPlugin()
    {
        return $this->getProvidedDependency(CmsContentWidgetProductSearchConnectorDependencyProvider::STORAGE_PRODUCT_MAPPER_PLUGIN);
    }
}
