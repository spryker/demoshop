<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\CmsContentWidgetProductSetConnector;

use Pyz\Yves\CmsContentWidgetProductConnector\CmsContentWidgetProductConnectorDependencyProvider;
use Spryker\Yves\CmsContentWidgetProductSetConnector\CmsContentWidgetProductSetConnectorConnectorFactory as SprykerCmsContentWidgetProductSetConnectorConnectorFactory;

class CmsContentWidgetProductSetConnectorFactory extends SprykerCmsContentWidgetProductSetConnectorConnectorFactory
{

    /**
     * @return \Pyz\Yves\Product\Dependency\Plugin\StorageProductMapperPluginInterface
     */
    public function getStorageMapperPlugin()
    {
        return $this->getProvidedDependency(CmsContentWidgetProductConnectorDependencyProvider::STORAGE_PRODUCT_MAPPER_PLUGIN);
    }

}
