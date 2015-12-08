<?php

namespace Pyz\Zed\Installer;

use Pyz\Zed\Shipment\Communication\Plugin\DemoDataInstaller as ShipmentShipmentShipmentDemoDataInstaller;
use Pyz\Zed\Stock\Communication\Plugin\DemoDataInstaller as StockStockStockDemoDataInstaller;
use Pyz\Zed\ProductSearch\Communication\Plugin\DemoDataInstaller as ProductSearchProductSearchProductSearchDemoDataInstaller;
use Pyz\Zed\Price\Communication\Plugin\DemoDataInstaller as PricePricePriceDemoDataInstaller;
use Pyz\Zed\ProductCategory\Communication\Plugin\DemoDataInstaller as ProductCategoryProductCategoryProductCategoryDemoDataInstaller;
use Pyz\Zed\Product\Communication\Plugin\DemoDataInstaller as ProductProductProductDemoDataInstaller;
use Pyz\Zed\Cms\Communication\Plugin\DemoDataInstaller as CommunicationCommunicationDemoDataInstaller;
use Pyz\Zed\Glossary\Communication\Plugin\DemoDataInstaller as PluginDemoDataInstaller;
use Pyz\Zed\Category\Communication\Plugin\DemoDataInstaller;
use SprykerFeature\Zed\Acl\Communication\Plugin\Installer as AclAclAclInstaller;
use SprykerFeature\Zed\User\Communication\Plugin\Installer as UserUserUserInstaller;
use SprykerFeature\Zed\Country\Communication\Plugin\Installer as CountryCountryCountryInstaller;
use SprykerEngine\Zed\Locale\Communication\Plugin\Installer as LocaleLocaleLocaleInstaller;
use SprykerFeature\Zed\Price\Communication\Plugin\Installer as CommunicationCommunicationInstaller;
use SprykerFeature\Zed\Product\Communication\Plugin\Installer as PluginInstaller;
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
            new PluginInstaller(),
            new CommunicationCommunicationInstaller(),
            new LocaleLocaleLocaleInstaller(),
            new CountryCountryCountryInstaller(),
            new UserUserUserInstaller(),
            new AclAclAclInstaller(),
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
            new CommunicationCommunicationDemoDataInstaller(),
            new ProductProductProductDemoDataInstaller(),
            new ProductCategoryProductCategoryProductCategoryDemoDataInstaller(),
            new PricePricePriceDemoDataInstaller(),
            new ProductSearchProductSearchProductSearchDemoDataInstaller(),
            new StockStockStockDemoDataInstaller(),
            new ShipmentShipmentShipmentDemoDataInstaller(),
        ];
    }

}
