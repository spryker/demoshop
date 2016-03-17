<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Icecat\Installer\Category;

use Pyz\Zed\Importer\Business\Icecat\Installer\AbstractIcecatInstaller;
use Spryker\Shared\Library\BatchIterator\CsvBatchIterator;

class CategoryInstaller extends AbstractIcecatInstaller
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
        return $this->dataDirectory . '/categories.csv';
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Category Attributes';
    }

}
