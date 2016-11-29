<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Updater\Business\Factory;

use Pyz\Zed\Updater\Business\Installer\Product\ProductStockInstaller;
use Pyz\Zed\Updater\UpdaterConfig;

/**
 * @method \Pyz\Zed\Updater\UpdaterConfig getConfig()
 */
class InstallerFactory extends AbstractFactory
{

    /**
     * @return \Pyz\Zed\Updater\Business\Factory\UpdaterFactory
     */
    protected function createUpdaterFactory()
    {
        return new UpdaterFactory();
    }

    /**
     * @return \Pyz\Zed\Updater\Business\Installer\Product\ProductStockInstaller
     */
    public function createProductStockInstaller()
    {
        $productStockUpdater = new ProductStockInstaller(
            $this->getUpdaterProductStockCollection(),
            $this->getConfig()->getImportDataDirectory(),
            $this->createProductStockUpdater()
        );

        return $productStockUpdater;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\ImporterInterface[]
     */
    public function getUpdaterProductStockCollection()
    {
        return [
            UpdaterConfig::RESOURCE_PRODUCT_STOCK => $this->createProductStockUpdater(),
        ];
    }

    /**
     * @return \Pyz\Zed\Updater\Business\Updater\Product\ProductStockUpdater
     */
    protected function createProductStockUpdater()
    {
        return $this->createUpdaterFactory()->createProductStockUpdater();
    }

}
