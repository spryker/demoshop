<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Installer;

use Pyz\Zed\Category\Communication\Plugin\DemoDataInstallerPlugin as CategoryDemoInstallerPlugin;
use Pyz\Zed\Cms\Communication\Plugin\DemoDataInstallerPlugin as CmsDemoDataInstallerPlugin;
use Pyz\Zed\Glossary\Communication\Plugin\DemoDataInstallerPlugin as GlossaryDemoDataInstallerPlugin;
use Pyz\Zed\Newsletter\Communication\Plugin\Installer as NewsletterInstallerPlugin;
use Pyz\Zed\Price\Communication\Plugin\DemoDataInstallerPlugin as PriceDemoDataInstallerPlugin;
use Pyz\Zed\ProductCategory\Communication\Plugin\DemoDataInstallerPlugin as ProductCategoryDemoDataInstallerPlugin;
use Pyz\Zed\ProductSearch\Communication\Plugin\DemoDataInstallerPlugin as ProductSearchDemoDataInstaller;
use Pyz\Zed\Product\Communication\Plugin\DemoDataInstallerPlugin as ProductDemoDataInstallerPlugin;
use Pyz\Zed\Shipment\Communication\Plugin\DemoDataInstallerPlugin as ShipmentDemoDataInstallerPlugin;
use Pyz\Zed\Stock\Communication\Plugin\DemoDataInstaller as StockDemoDataInstallerPlugin;
use Spryker\Zed\Acl\Communication\Plugin\Installer as AclInstallerPlugin;
use Spryker\Zed\Category\Dependency\Facade\CategoryToLocaleBridge;
use Spryker\Zed\Category\Dependency\Facade\CategoryToTouchBridge;
use Spryker\Zed\Category\Dependency\Facade\CategoryToUrlBridge;
use Spryker\Zed\Cms\Dependency\Facade\CmsToGlossaryBridge;
use Spryker\Zed\Cms\Dependency\Facade\CmsToTouchBridge;
use Spryker\Zed\Cms\Dependency\Facade\CmsToUrlBridge;
use Spryker\Zed\Collector\Communication\Plugin\Installer as CollectorInstallerPlugin;
use Spryker\Zed\Country\Communication\Plugin\Installer as CountryCountryCountryInstallerPlugin;
use Spryker\Zed\Installer\InstallerDependencyProvider as SprykerInstallerDependencyProvider;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Locale\Communication\Plugin\Installer as LocaleInstallerPlugin;
use Spryker\Zed\Price\Communication\Plugin\Installer as PriceInstallerPlugin;
use Spryker\Zed\Product\Communication\Plugin\Installer as ProductInstallerPlugin;
use Spryker\Zed\Propel\Communication\Plugin\Connection;
use Spryker\Zed\User\Communication\Plugin\Installer as UserInstallerPlugin;

class InstallerDependencyProvider extends SprykerInstallerDependencyProvider
{

    const FACADE_CATEGORY = 'FACADE_CATEGORY';
    const FACADE_LOCALE = 'FACADE_LOCALE';
    const FACADE_GLOSSARY = 'FACADE_GLOSSARY';
    const FACADE_PRODUCT = 'FACADE_PRODUCT';
    const FACADE_PRODUCT_CATEGORY = 'FACADE_PRODUCT_CATEGORY';
    const FACADE_PRODUCT_SEARCH = 'FACADE_PRODUCT_SEARCH';
    const FACADE_TOUCH = 'FACADE_TOUCH';
    const FACADE_URL = 'FACADE_URL';
    const FACADE_STOCK = 'FACADE_STOCK';

    const QUERY_CONTAINER_CMS = 'QUERY_CONTAINER_CMS';
    const QUERY_CONTAINER_CATEGORY = 'QUERY_CONTAINER_CATEGORY';
    const QUERY_CONTAINER_LOCALE = 'QUERY_CONTAINER_LOCALE';
    const QUERY_CONTAINER_PRODUCT = 'QUERY_CONTAINER_PRODUCT';
    const QUERY_CONTAINER_PRODUCT_CATEGORY = 'QUERY_CONTAINER_PRODUCT_CATEGORY';
    const QUERY_CONTAINER_PRODUCT_SEARCH = 'QUERY_CONTAINER_PRODUCT_SEARCH';
    const QUERY_CONTAINER_PRICE = 'QUERY_CONTAINER_PRICE';

    const BRIDGE_CATEGORY_TO_URL = 'BRIDGE_CATEGORY_TO_URL';
    const BRIDGE_CATEGORY_TO_TOUCH = 'BRIDGE_CATEGORY_TO_TOUCH';
    const BRIDGE_CATEGORY_TO_LOCALE = 'BRIDGE_CATEGORY_TO_LOCALE';

    const BRIDGE_CMS_TO_GLOSSARY = 'BRIDGE_CMS_TO_GLOSSARY';
    const BRIDGE_CMS_TO_TOUCH = 'BRIDGE_CMS_TO_TOUCH';
    const BRIDGE_CMS_TO_URL = 'BRIDGE_CMS_TO_URL';

    const INSTALLERS_DEMO_DATA_PLUGINS = 'INSTALLERS_DEMO_DATA';
    const PLUGIN_PROPEL_CONNECTION = 'PLUGIN_PROPEL_CONNECTION';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container[self::FACADE_CATEGORY] = function (Container $container) {
            return $container->getLocator()->category()->facade();
        };

        $container[self::FACADE_LOCALE] = function (Container $container) {
            return $container->getLocator()->locale()->facade();
        };

        $container[self::FACADE_GLOSSARY] = function (Container $container) {
            return $container->getLocator()->glossary()->facade();
        };

        $container[self::FACADE_PRODUCT] = function (Container $container) {
            return $container->getLocator()->product()->facade();
        };

        $container[self::FACADE_PRODUCT_CATEGORY] = function (Container $container) {
            return $container->getLocator()->productCategory()->facade();
        };

        $container[self::FACADE_TOUCH] = function (Container $container) {
            return $container->getLocator()->touch()->facade();
        };

        $container[self::FACADE_URL] = function (Container $container) {
            return $container->getLocator()->url()->facade();
        };

        $container[self::FACADE_STOCK] = function (Container $container) {
            return $container->getLocator()->stock()->facade();
        };

        $container[self::FACADE_PRODUCT_SEARCH] = function (Container $container) {
            return $container->getLocator()->productSearch()->facade();
        };

        $container[self::QUERY_CONTAINER_CMS] = function (Container $container) {
            return $container->getLocator()->cms()->queryContainer();
        };

        $container[self::QUERY_CONTAINER_PRODUCT] = function (Container $container) {
            return $container->getLocator()->product()->queryContainer();
        };

        $container[self::QUERY_CONTAINER_PRODUCT_CATEGORY] = function (Container $container) {
            return $container->getLocator()->productCategory()->queryContainer();
        };

        $container[self::QUERY_CONTAINER_PRODUCT_SEARCH] = function (Container $container) {
            return $container->getLocator()->productSearch()->queryContainer();
        };

        $container[self::QUERY_CONTAINER_PRICE] = function (Container $container) {
            return $container->getLocator()->price()->queryContainer();
        };

        $container[self::QUERY_CONTAINER_CATEGORY] = function (Container $container) {
            return $container->getLocator()->category()->queryContainer();
        };

        $container[self::QUERY_CONTAINER_LOCALE] = function (Container $container) {
            return $container->getLocator()->locale()->queryContainer();
        };

        $container[self::BRIDGE_CATEGORY_TO_URL] = function (Container $container) {
            return new CategoryToUrlBridge($container->getLocator()->url()->facade());
        };

        $container[self::BRIDGE_CATEGORY_TO_TOUCH] = function (Container $container) {
            return new CategoryToTouchBridge($container->getLocator()->touch()->facade());
        };

        $container[self::BRIDGE_CATEGORY_TO_LOCALE] = function (Container $container) {
            return new CategoryToLocaleBridge($container->getLocator()->locale()->facade());
        };

        $container[self::BRIDGE_CMS_TO_GLOSSARY] = function (Container $container) {
            return new CmsToGlossaryBridge($container->getLocator()->glossary()->facade());
        };

        $container[self::BRIDGE_CMS_TO_TOUCH] = function (Container $container) {
            return new CmsToTouchBridge($container->getLocator()->touch()->facade());
        };

        $container[self::BRIDGE_CMS_TO_URL] = function (Container $container) {
            return new CmsToUrlBridge($container->getLocator()->url()->facade());
        };

        $container[self::INSTALLERS_DEMO_DATA_PLUGINS] = function (Container $container) {
            return $this->getDemoDataInstallerPlugins();
        };

        $container[self::PLUGIN_PROPEL_CONNECTION] = function () {
            return (new Connection())->get();
        };

        return $container;
    }

    /**
     * @return \Spryker\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin[]
     */
    public function getInstallerPlugins()
    {
        return [
            new CollectorInstallerPlugin(),
            new ProductInstallerPlugin(),
            new PriceInstallerPlugin(),
            new LocaleInstallerPlugin(),
            new CountryCountryCountryInstallerPlugin(),
            new UserInstallerPlugin(),
            new AclInstallerPlugin(),
            new NewsletterInstallerPlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin[]
     */
    public function getDemoDataInstallerPlugins()
    {
        return [
            new CategoryDemoInstallerPlugin(),
            new GlossaryDemoDataInstallerPlugin(),
            new CmsDemoDataInstallerPlugin(),
            new ProductDemoDataInstallerPlugin(),
            new ProductCategoryDemoDataInstallerPlugin(),
            new PriceDemoDataInstallerPlugin(),
            new ProductSearchDemoDataInstaller(),
            new StockDemoDataInstallerPlugin(),
            new ShipmentDemoDataInstallerPlugin(),
        ];
    }

}
