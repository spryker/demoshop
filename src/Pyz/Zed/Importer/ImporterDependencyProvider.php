<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer;

use Spryker\Zed\Category\Dependency\Facade\CategoryToLocaleBridge;
use Spryker\Zed\Category\Dependency\Facade\CategoryToTouchBridge;
use Spryker\Zed\Category\Dependency\Facade\CategoryToUrlBridge;
use Spryker\Zed\Cms\Dependency\Facade\CmsToGlossaryBridge;
use Spryker\Zed\Cms\Dependency\Facade\CmsToTouchBridge;
use Spryker\Zed\Cms\Dependency\Facade\CmsToUrlBridge;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Propel\Communication\Plugin\Connection;

class ImporterDependencyProvider extends AbstractBundleDependencyProvider
{

    const FACADE_CATEGORY = 'FACADE_CATEGORY';
    const FACADE_LOCALE = 'FACADE_LOCALE';
    const FACADE_GLOSSARY = 'FACADE_GLOSSARY';
    const FACADE_PRODUCT = 'FACADE_PRODUCT';
    const FACADE_PRODUCT_MANAGEMENT = 'FACADE_PRODUCT_MANAGEMENT';
    const FACADE_PRODUCT_CATEGORY = 'FACADE_PRODUCT_CATEGORY';
    const FACADE_PRODUCT_SEARCH = 'FACADE_PRODUCT_SEARCH';
    const FACADE_TOUCH = 'FACADE_TOUCH';
    const FACADE_URL = 'FACADE_URL';
    const FACADE_STOCK = 'FACADE_STOCK';
    const FACADE_TAX = 'FACADE_TAX';
    const FACADE_COUNTRY = 'FACADE_COUNTRY';

    const FACADE_DISCOUNT = 'FACADE_DISCOUNT';
    const FACADE_PRODUCT_OPTION = 'FACADE_PRODUCT_OPTION';

    const QUERY_CONTAINER_CMS = 'QUERY_CONTAINER_CMS';
    const QUERY_CONTAINER_CATEGORY = 'QUERY_CONTAINER_CATEGORY';
    const QUERY_CONTAINER_LOCALE = 'QUERY_CONTAINER_LOCALE';
    const QUERY_CONTAINER_PRODUCT = 'QUERY_CONTAINER_PRODUCT';
    const QUERY_CONTAINER_PRODUCT_CATEGORY = 'QUERY_CONTAINER_PRODUCT_CATEGORY';
    const QUERY_CONTAINER_PRODUCT_SEARCH = 'QUERY_CONTAINER_PRODUCT_SEARCH';
    const QUERY_CONTAINER_PRICE = 'QUERY_CONTAINER_PRICE';
    const QUERY_CONTAINER_SHIPMENT = 'QUERY_CONTAINER_SHIPMENT';
    const QUERY_CONTAINER_TAX = 'QUERY_CONTAINER_TAX';

    const BRIDGE_CATEGORY_TO_URL = 'BRIDGE_CATEGORY_TO_URL';
    const BRIDGE_CATEGORY_TO_TOUCH = 'BRIDGE_CATEGORY_TO_TOUCH';
    const BRIDGE_CATEGORY_TO_LOCALE = 'BRIDGE_CATEGORY_TO_LOCALE';

    const BRIDGE_CMS_TO_GLOSSARY = 'BRIDGE_CMS_TO_GLOSSARY';
    const BRIDGE_CMS_TO_TOUCH = 'BRIDGE_CMS_TO_TOUCH';
    const BRIDGE_CMS_TO_URL = 'BRIDGE_CMS_TO_URL';

    const PLUGIN_PROPEL_CONNECTION = 'PLUGIN_PROPEL_CONNECTION';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container[static::FACADE_PRODUCT_OPTION] = function (Container $container) {
            return $container->getLocator()->productOption()->facade();
        };

        $container[static::FACADE_CATEGORY] = function (Container $container) {
            return $container->getLocator()->category()->facade();
        };

        $container[static::FACADE_LOCALE] = function (Container $container) {
            return $container->getLocator()->locale()->facade();
        };

        $container[static::FACADE_GLOSSARY] = function (Container $container) {
            return $container->getLocator()->glossary()->facade();
        };

        $container[static::FACADE_PRODUCT] = function (Container $container) {
            return $container->getLocator()->product()->facade();
        };

        $container[static::FACADE_PRODUCT_MANAGEMENT] = function (Container $container) {
            return $container->getLocator()->productManagement()->facade();
        };

        $container[static::FACADE_PRODUCT_CATEGORY] = function (Container $container) {
            return $container->getLocator()->productCategory()->facade();
        };

        $container[static::FACADE_TOUCH] = function (Container $container) {
            return $container->getLocator()->touch()->facade();
        };

        $container[static::FACADE_URL] = function (Container $container) {
            return $container->getLocator()->url()->facade();
        };

        $container[static::FACADE_STOCK] = function (Container $container) {
            return $container->getLocator()->stock()->facade();
        };

        $container[static::FACADE_TAX] = function (Container $container) {
            return $container->getLocator()->tax()->facade();
        };

        $container[static::FACADE_PRODUCT_SEARCH] = function (Container $container) {
            return $container->getLocator()->productSearch()->facade();
        };

        $container[static::FACADE_DISCOUNT] = function (Container $container) {
            return $container->getLocator()->discount()->facade();
        };

        $container[static::FACADE_COUNTRY] = function (Container $container) {
            return $container->getLocator()->country()->facade();
        };

        $container[static::QUERY_CONTAINER_CMS] = function (Container $container) {
            return $container->getLocator()->cms()->queryContainer();
        };

        $container[static::QUERY_CONTAINER_PRODUCT] = function (Container $container) {
            return $container->getLocator()->product()->queryContainer();
        };

        $container[static::QUERY_CONTAINER_PRODUCT_CATEGORY] = function (Container $container) {
            return $container->getLocator()->productCategory()->queryContainer();
        };

        $container[static::QUERY_CONTAINER_PRODUCT_SEARCH] = function (Container $container) {
            return $container->getLocator()->productSearch()->queryContainer();
        };

        $container[static::QUERY_CONTAINER_PRICE] = function (Container $container) {
            return $container->getLocator()->price()->queryContainer();
        };

        $container[static::QUERY_CONTAINER_CATEGORY] = function (Container $container) {
            return $container->getLocator()->category()->queryContainer();
        };

        $container[static::QUERY_CONTAINER_LOCALE] = function (Container $container) {
            return $container->getLocator()->locale()->queryContainer();
        };

        $container[static::QUERY_CONTAINER_SHIPMENT] = function (Container $container) {
            return $container->getLocator()->shipment()->queryContainer();
        };

        $container[static::BRIDGE_CATEGORY_TO_URL] = function (Container $container) {
            return new CategoryToUrlBridge($container->getLocator()->url()->facade());
        };

        $container[static::BRIDGE_CATEGORY_TO_TOUCH] = function (Container $container) {
            return new CategoryToTouchBridge($container->getLocator()->touch()->facade());
        };

        $container[static::BRIDGE_CATEGORY_TO_LOCALE] = function (Container $container) {
            return new CategoryToLocaleBridge($container->getLocator()->locale()->facade());
        };

        $container[static::BRIDGE_CMS_TO_GLOSSARY] = function (Container $container) {
            return new CmsToGlossaryBridge($container->getLocator()->glossary()->facade());
        };

        $container[static::BRIDGE_CMS_TO_TOUCH] = function (Container $container) {
            return new CmsToTouchBridge($container->getLocator()->touch()->facade());
        };

        $container[static::BRIDGE_CMS_TO_URL] = function (Container $container) {
            return new CmsToUrlBridge($container->getLocator()->url()->facade());
        };

        $container[static::QUERY_CONTAINER_TAX] = function (Container $container) {
            return $container->getLocator()->tax()->queryContainer();
        };

        $container[static::PLUGIN_PROPEL_CONNECTION] = function () {
            return (new Connection())->get();
        };

        return $container;
    }

}
