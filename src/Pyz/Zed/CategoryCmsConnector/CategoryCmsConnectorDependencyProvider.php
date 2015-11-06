<?php

namespace Pyz\Zed\CategoryCmsConnector;

use SprykerEngine\Zed\Kernel\Container;
use PavFeature\Zed\CategoryCmsConnector\CategoryCmsConnectorDependencyProvider as PavFeatureCategoryCmsConnectorDependencyProvider;

class CategoryCmsConnectorDependencyProvider extends PavFeatureCategoryCmsConnectorDependencyProvider
{

    const FACADE_CMS = 'cms facade';

    /**
     * @param Container $container
     *
     * @return Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container[self::FACADE_CMS] = function (Container $container) {
            return $container->getLocator()->cms()->facade();
        };

        $container['category query container'] = function (Container $container) {
            return $container->getLocator()->cms()->facade();
        };

    }

    public function provideCommunicationLayerDependencies(Container $container)
    {

    }
}
