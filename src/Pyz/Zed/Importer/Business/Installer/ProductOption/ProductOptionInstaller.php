<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Installer\ProductOption;

use Pyz\Zed\Importer\Business\Installer\AbstractInstaller;
use Spryker\Shared\Library\BatchIterator\CsvBatchIterator;

class ProductOptionInstaller extends AbstractInstaller
{

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
        return $this->dataDirectory . '/product_options.csv';
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Product options';
    }

}
