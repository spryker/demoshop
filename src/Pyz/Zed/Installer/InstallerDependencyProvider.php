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
use Pyz\Zed\Category\Communication\Plugin\DemoDataInstaller as CategoryDemoInstaller;
use Spryker\Zed\Acl\Communication\Plugin\Installer as AclInstaller;
use Spryker\Zed\User\Communication\Plugin\Installer as UserInstaller;
use Spryker\Zed\Country\Communication\Plugin\Installer as CountryCountryCountryInstaller;
use Spryker\Zed\Locale\Communication\Plugin\Installer as LocaleInstaller;
use Spryker\Zed\Price\Communication\Plugin\Installer as PriceInstaller;
use Spryker\Zed\Product\Communication\Plugin\Installer as ProductInstaller;
use Spryker\Zed\Collector\Communication\Plugin\Installer as CollectorInstaller;
use Spryker\Zed\Installer\Business\Model\AbstractInstaller;
use Spryker\Zed\Installer\InstallerDependencyProvider as SprykerInstallerDependencyProvider;


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
