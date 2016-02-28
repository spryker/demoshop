<?php

namespace Pyz\Zed\Installer\Business\Icecat\Installer;

use Pyz\Zed\Installer\Business\Icecat\AbstractIcecatInstaller;
use Spryker\Shared\Library\BatchIterator\CsvBatchIterator;
use Symfony\Component\Console\Output\OutputInterface;

class CategoryCatalogInstaller extends AbstractIcecatInstaller
{

    /**
     * @return \Spryker\Shared\Library\BatchIterator\CountableIteratorInterface
     */
    protected function getBatchIterator()
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
        return 'Category Catalog';
    }

}
