<?php

/*
 * (c) Copyright Spryker Systems GmbH 2015
 */

namespace Pyz\Zed\Installer;

use Pyz\Zed\Newsletter\Communication\Plugin\Installer as NewsletterInstaller;
use Pyz\Zed\Shipment\Communication\Plugin\DemoDataInstaller as ShipmentDemoDataInstaller;
use Pyz\Zed\Stock\Communication\Plugin\DemoDataInstaller as StockDemoDataInstaller;
use Pyz\Zed\ProductSearch\Communication\Plugin\DemoDataInstaller as ProductSearchDemoDataInstaller;
use Pyz\Zed\Price\Communication\Plugin\DemoDataInstaller as PriceDemoDataInstaller;
use Pyz\Zed\ProductCategory\Communication\Plugin\DemoDataInstaller as ProductCategoryDemoDataInstaller;
use Pyz\Zed\Product\Communication\Plugin\DemoDataInstaller as ProductDemoDataInstaller;
use Pyz\Zed\Cms\Communication\Plugin\DemoDataInstaller as CmsDemoDataInstaller;
use Pyz\Zed\Glossary\Communication\Plugin\DemoDataInstaller as GlossaryDemoDataInstaller;
use Pyz\Zed\Category\Communication\Plugin\DemoDataInstaller as CategoryDemoInstaller;
use Spryker\Zed\Acl\Communication\Plugin\Installer as AclInstaller;
use Spryker\Zed\Category\Dependency\Facade\CategoryToLocaleBridge;
use Spryker\Zed\Category\Dependency\Facade\CategoryToTouchBridge;
use Spryker\Zed\Category\Dependency\Facade\CategoryToUrlBridge;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\User\Communication\Plugin\Installer as UserInstaller;
use Spryker\Zed\Country\Communication\Plugin\Installer as CountryCountryCountryInstaller;
use Spryker\Zed\Locale\Communication\Plugin\Installer as LocaleInstaller;
use Spryker\Zed\Price\Communication\Plugin\Installer as PriceInstaller;
use Spryker\Zed\Product\Communication\Plugin\Installer as ProductInstaller;
use Spryker\Zed\Collector\Communication\Plugin\Installer as CollectorInstaller;
use Spryker\Zed\Installer\InstallerDependencyProvider as SprykerInstallerDependencyProvider;

class InstallerDependencyProvider extends SprykerInstallerDependencyProvider
{

    const FACADE_CATEGORY = 'facade category';
    const FACADE_LOCALE = 'facade locale';
    const FACADE_PRODUCT = 'facade product';
    const FACADE_PRODUCT_CATEGORY = 'facade product category';
    const FACADE_TOUCH = 'facade touch';
    const FACADE_URL = 'facade url';

    const QUERY_CONTAINER_CATEGORY = 'query container category';
    const QUERY_CONTAINER_LOCALE = 'query container locale';
    const QUERY_CONTAINER_PRODUCT = 'query container product';

    const BRIDGE_CATEGORY_TO_URL = 'BRIDGE_CATEGORY_TO_URL';
    const BRIDGE_CATEGORY_TO_TOUCH = 'BRIDGE_CATEGORY_TO_TOUCH';
    const BRIDGE_CATEGORY_TO_LOCALE = 'BRIDGE_CATEGORY_TO_LOCALE';

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

        $container[self::QUERY_CONTAINER_PRODUCT] = function (Container $container) {
            return $container->getLocator()->product()->queryContainer();
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

        return $container;
    }

    /**
     * @return \Spryker\Zed\Installer\Business\Model\AbstractInstaller[]
     */
    public function getInstallers()
    {
        return [
            new CollectorInstaller(),
            new ProductInstaller(),
            new PriceInstaller(),
            new LocaleInstaller(),
            new CountryCountryCountryInstaller(),
            new UserInstaller(),
            new AclInstaller(),
            new NewsletterInstaller(),
        ];
    }

    /**
     * @return \Spryker\Zed\Installer\Business\Model\AbstractInstaller[]
     */
    public function getDemoDataInstallers()
    {
        return [
            new CategoryDemoInstaller(),
            new GlossaryDemoDataInstaller(),
            new CmsDemoDataInstaller(),
            new ProductDemoDataInstaller(),
            new ProductCategoryDemoDataInstaller(),
            new PriceDemoDataInstaller(),
            new ProductSearchDemoDataInstaller(),
            new StockDemoDataInstaller(),
            new ShipmentDemoDataInstaller(),
        ];
    }

}
