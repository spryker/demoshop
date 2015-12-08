<?php

namespace Pyz\Zed\Cms;

use SprykerEngine\Zed\Kernel\Container;
use PavFeature\Zed\Cms\CmsDependencyProvider as PavCmsDependencyProvider;

class CmsDependencyProvider extends PavCmsDependencyProvider
{

    const PLUGIN_DEMO_DATA_INSTALLER = 'demo data installer';

    const FACADE_GLOSSARY = 'glossary facade';

    const FACADE_LOCALE = 'locale facade';

    const FACADE_URL = 'url facade';

    const FACADE_TOUCH = 'touch facade';

    const FACADE_FILE_UPLOAD = 'file upload facade';

    const FACADE_CMS_BLOCK = 'cms block facade';
    const QUERY_CONTAINER_CATEGORY_CMS = 'category query container';
    const QUERY_CONTAINER_PRODUCT = 'product query container';

    /**
     * @param Container $container
     *
     * @return Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        parent::provideBusinessLayerDependencies($container);

        // @todo this is not a external dependency
        $container[self::PLUGIN_DEMO_DATA_INSTALLER] = function (Container $container) {
            return $container->getLocator()->cms()->pluginDemoDataInstaller();
        };

        $container[self::FACADE_GLOSSARY] = function (Container $container) {
            return $container->getLocator()->glossary()->facade();
        };

        $container[self::FACADE_LOCALE] = function (Container $container) {
            return $container->getLocator()->locale()->facade();
        };

        $container[self::FACADE_URL] = function (Container $container) {
            return $container->getLocator()->url()->facade();
        };

        $container[self::FACADE_TOUCH] = function (Container $container) {
            return $container->getLocator()->touch()->facade();
        };

        $container[self::FACADE_CMS_BLOCK] = function (Container $container) {
            return $container->getLocator()->cmsBlock()->facade();
        };

        return $container;
    }

    public function provideCommunicationLayerDependencies(Container $container)
    {
        parent::provideCommunicationLayerDependencies($container);

        $container[self::FACADE_FILE_UPLOAD] = function (Container $container) {
            return $container->getLocator()->fileUpload()->facade();
        };

        $container[self::FACADE_GLOSSARY] = function (Container $container) {
            return $container->getLocator()->glossary()->facade();
        };

        $container[self::QUERY_CONTAINER_CATEGORY_CMS] = function (Container $container) {
            return $container->getLocator()->categoryCmsConnector()->queryContainer();
        };

        $container[self::QUERY_CONTAINER_PRODUCT] = function (Container $container) {
            return $container->getLocator()->product()->queryContainer();
        };

        $container[self::FACADE_URL] = function (Container $container) {
            return $container->getLocator()->url()->facade();
        };

        return $container;
    }
}
