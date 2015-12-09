<?php

namespace Pyz\Zed\Installer;

use Pyz\Zed\Shipment\Communication\Plugin\DemoDataInstaller as ShipmentDemoDataInstaller;
use Pyz\Zed\Stock\Communication\Plugin\DemoDataInstaller as StockDemoDataInstaller;
use Pyz\Zed\ProductSearch\Communication\Plugin\DemoDataInstaller as ProductSearchDemoDataInstaller;
use Pyz\Zed\Price\Communication\Plugin\DemoDataInstaller as PriceDemoDataInstaller;
use Pyz\Zed\ProductCategory\Communication\Plugin\DemoDataInstaller as ProductCategoryDemoDataInstaller;
use Pyz\Zed\Product\Communication\Plugin\DemoDataInstaller as ProductDemoDataInstaller;
use Pyz\Zed\Cms\Communication\Plugin\DemoDataInstaller as CmsDemoDataInstaller;
use Pyz\Zed\Glossary\Communication\Plugin\DemoDataInstaller as PluginDemoDataInstaller;
use Pyz\Zed\Category\Communication\Plugin\DemoDataInstaller;
use SprykerFeature\Zed\Acl\Communication\Plugin\Installer as AclInstaller;
use SprykerFeature\Zed\User\Communication\Plugin\Installer as UserInstaller;
use SprykerFeature\Zed\Country\Communication\Plugin\Installer as CountryCountryCountryInstaller;
use SprykerEngine\Zed\Locale\Communication\Plugin\Installer as LocaleInstaller;
use SprykerFeature\Zed\Price\Communication\Plugin\Installer as PriceInstaller;
use SprykerFeature\Zed\Product\Communication\Plugin\Installer as ProductInstaller;
use SprykerFeature\Zed\Collector\Communication\Plugin\Installer;
use SprykerFeature\Zed\Installer\InstallerConfig as SprykerInstallerConfig;
use SprykerFeature\Zed\Installer\Business\Model\AbstractInstaller;

class InstallerConfig extends SprykerInstallerConfig
{

    /**
     * @return AbstractInstaller[]
     */
    public function getInstallerStack()
    {
        return [
            new Installer(),
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
    public function getDemoDataInstallerStack()
    {
        return [
            new DemoDataInstaller(),
            new PluginDemoDataInstaller(),
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
