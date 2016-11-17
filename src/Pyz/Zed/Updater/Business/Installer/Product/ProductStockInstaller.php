<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Updater\Business\Installer\Product;

use Pyz\Zed\Importer\Business\Installer\AbstractInstaller;
use Pyz\Zed\Updater\Business\Updater\Product\ProductStockUpdater;
use Spryker\Shared\Library\BatchIterator\CsvBatchIterator;

class ProductStockInstaller extends AbstractInstaller
{

    /**
     * @var \Pyz\Zed\Updater\Business\Updater\Product\ProductStockUpdater
     */
    protected $productStockUpdater;

    /**
     * @param array|\Pyz\Zed\Importer\Business\Importer\ImporterInterface[] $importerCollection
     * @param string $dataDirectory
     * @param \Pyz\Zed\Updater\Business\Updater\Product\ProductStockUpdater $productStockUpdater
     */
    public function __construct(
        array $importerCollection,
        $dataDirectory,
        ProductStockUpdater $productStockUpdater
    ) {

        parent::__construct($importerCollection, $dataDirectory);

        $this->productStockUpdater = $productStockUpdater;
    }

    /**
     * @return \Spryker\Shared\Library\BatchIterator\CountableIteratorInterface
     */
    protected function buildBatchIterator()
    {
        return new CsvBatchIterator($this->getCsvDataFilename());
    }

    /**
     * @return string
     */
    protected function getCsvDataFilename()
    {
        return $this->dataDirectory . '/stocks.csv';
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Product Stock';
    }

    /**
     * @return void
     */
    protected function afterInstall()
    {
        $this->productStockUpdater->triggerStockUpdateEvent();
    }

}
