<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Updater\Business\Factory;

use Pyz\Zed\Updater\Business\Updater\Product\ProductStockUpdater;
use Spryker\Zed\Cms\CmsConfig;
use Symfony\Component\Finder\Finder;

/**
 * @method \Pyz\Zed\Updater\UpdaterConfig getConfig()
 */
class UpdaterFactory extends AbstractFactory
{

    /**
     * @return \Pyz\Zed\Updater\Business\Updater\Product\ProductStockUpdater
     */
    public function createProductStockUpdater()
    {
        $productStockUpdater = new ProductStockUpdater(
            $this->createCsvFileReader(),
            $this->getLocaleFacade(),
            $this->getStockFacade(),
            $this->getOmsFacade(),
            $this->getProductQueryContainer(),
            $this->getStockQueryContainer(),
            $this->getSalesQueryContainer(),
            $this->getConfig()->getImportDataDirectory()
        );

        return $productStockUpdater;
    }

    /**
     * @return \Spryker\Zed\Cms\CmsConfig
     */
    protected function createCmsConfig()
    {
        return new CmsConfig();
    }

    /**
     * @return \Symfony\Component\Finder\Finder
     */
    protected function createFinder()
    {
        return new Finder();
    }

}
