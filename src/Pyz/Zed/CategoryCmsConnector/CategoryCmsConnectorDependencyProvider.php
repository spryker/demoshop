<?php

namespace Pyz\Zed\CategoryCmsConnector;

use SprykerEngine\Zed\Kernel\Container;
use PavFeature\Zed\CategoryCmsConnector\CategoryCmsConnectorDependencyProvider as PavFeatureCategoryCmsConnectorDependencyProvider;

class CategoryCmsConnectorDependencyProvider extends PavFeatureCategoryCmsConnectorDependencyProvider
{

    const FACADE_CMS = 'cms facade';
    const QUERY_CONTAINER_CATEGORY = 'category query container';

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
    }

    public function provideCommunicationLayerDependencies(Container $container)
    {

    }

    /**
     * @param Container $container
     *
     * @return Container
     */
    public function providePersistenceLayerDependencies(Container $container)
    {
        $container[self::QUERY_CONTAINER_CATEGORY] = function (Container $container) {
            return $container->getLocator()->category()->queryContainer();
        };

        return $container;
    }
}
