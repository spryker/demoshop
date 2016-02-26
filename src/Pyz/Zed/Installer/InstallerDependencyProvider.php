<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Installer;

use Pyz\Zed\Category\Communication\Plugin\DemoDataInstaller as CategoryDemoInstaller;
use Pyz\Zed\Cms\Communication\Plugin\DemoDataInstaller as CmsDemoDataInstaller;
use Pyz\Zed\Glossary\Communication\Plugin\DemoDataInstaller as GlossaryDemoDataInstaller;
use Pyz\Zed\Newsletter\Communication\Plugin\Installer as NewsletterInstaller;
use Pyz\Zed\Price\Communication\Plugin\DemoDataInstaller as PriceDemoDataInstaller;
use Pyz\Zed\ProductCategory\Communication\Plugin\DemoDataInstaller as ProductCategoryDemoDataInstaller;
use Pyz\Zed\ProductSearch\Communication\Plugin\DemoDataInstaller as ProductSearchDemoDataInstaller;
use Pyz\Zed\Product\Communication\Plugin\DemoDataInstaller as ProductDemoDataInstaller;
use Pyz\Zed\Shipment\Communication\Plugin\DemoDataInstaller as ShipmentDemoDataInstaller;
use Pyz\Zed\Stock\Communication\Plugin\DemoDataInstaller as StockDemoDataInstaller;
use Spryker\Zed\Acl\Communication\Plugin\Installer as AclInstaller;
use Spryker\Zed\Collector\Communication\Plugin\Installer as CollectorInstaller;
use Spryker\Zed\Country\Communication\Plugin\Installer as CountryCountryCountryInstaller;
use Spryker\Zed\Installer\InstallerDependencyProvider as SprykerInstallerDependencyProvider;
use Spryker\Zed\Locale\Communication\Plugin\Installer as LocaleInstaller;
use Spryker\Zed\Price\Communication\Plugin\Installer as PriceInstaller;
use Spryker\Zed\Product\Communication\Plugin\Installer as ProductInstaller;
use Spryker\Zed\User\Communication\Plugin\Installer as UserInstaller;

class InstallerDependencyProvider extends SprykerInstallerDependencyProvider
{

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
