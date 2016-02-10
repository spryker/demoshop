<?php

/*
 * (c) Copyright Spryker Systems GmbH 2015
 */

namespace Pyz\Zed\Installer;

use Pyz\Zed\Installer\Business\Model\Icecat\Mapper\CategoryMapper;
use Pyz\Zed\Installer\Business\Model\Icecat\Mapper\LocaleMapper;
use Pyz\Zed\Installer\Business\Model\Icecat\Mapper\ProductMapper;
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

    const MAPPERS_ICECAT_DATA = 'icecat data installer mappers';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container[self::MAPPERS_ICECAT_DATA] = function (Container $container) {
            return $this->getIcecatDataMappers();
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

    /**
     * @return \Pyz\Zed\Installer\Business\Model\Icecat\AbstractMapper[]
     */
    public function getIcecatDataMappers()
    {
        //$path = $this->getConfig TODO how to get config here?
        $path = __DIR__ . '/Business/Internal/DemoData/Icecat/';

        return [
            InstallerConfig::CATEGORY_RESOURCE => new CategoryMapper($path),
            InstallerConfig::LOCALE_RESOURCE => new LocaleMapper($path),
            InstallerConfig::PRODUCT_RESOURCE => new ProductMapper($path),
        ];
    }

}
