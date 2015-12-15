<?php

/*
 * (c) Copyright Spryker Systems GmbH 2015
 */

namespace Pyz\Zed\Installer;

use Pyz\Zed\Shipment\Communication\Plugin\DemoDataInstaller as ShipmentDemoDataInstaller;
use Pyz\Zed\Stock\Communication\Plugin\DemoDataInstaller as StockDemoDataInstaller;
use Pyz\Zed\ProductSearch\Communication\Plugin\DemoDataInstaller as ProductSearchDemoDataInstaller;
use Pyz\Zed\Price\Communication\Plugin\DemoDataInstaller as PriceDemoDataInstaller;
use Pyz\Zed\ProductCategory\Communication\Plugin\DemoDataInstaller as ProductCategoryDemoDataInstaller;
use Pyz\Zed\Product\Communication\Plugin\DemoDataInstaller as ProductDemoDataInstaller;
use Pyz\Zed\Cms\Communication\Plugin\DemoDataInstaller as CmsDemoDataInstaller;
use Pyz\Zed\Glossary\Communication\Plugin\DemoDataInstaller as GlossaryDemoDataInstaller;
use SprykerFeature\Zed\Acl\Communication\Plugin\Installer as AclInstaller;
use SprykerFeature\Zed\User\Communication\Plugin\Installer as UserInstaller;
use SprykerFeature\Zed\Country\Communication\Plugin\Installer as CountryCountryCountryInstaller;
use SprykerEngine\Zed\Locale\Communication\Plugin\Installer as LocaleInstaller;
use SprykerFeature\Zed\Price\Communication\Plugin\Installer as PriceInstaller;
use SprykerFeature\Zed\Product\Communication\Plugin\Installer as ProductInstaller;
use SprykerFeature\Zed\Collector\Communication\Plugin\Installer as CollectorInstaller;
use SprykerEngine\Zed\Kernel\Container;
use SprykerFeature\Zed\Installer\Business\Model\AbstractInstaller;
use SprykerFeature\Zed\Installer\InstallerDependencyProvider as SprykerInstallerDependencyProvider;

class InstallerDependencyProvider extends SprykerInstallerDependencyProvider
{

    /**
     * @return AbstractInstaller[]
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
        ];
    }

    /**
     * @return AbstractInstaller[]
     */
    public function getDemoDataInstallers()
    {
        return [
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
