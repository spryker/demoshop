<?php

namespace Pyz\Zed\Installer\Business\Icecat\Installer;

use Spryker\Shared\Library\BatchIterator\CsvBatchIterator;
use Symfony\Component\Console\Output\OutputInterface;

class CategoryRootInstaller extends AbstractIcecatInstaller
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
        return $this->dataDirectory . '/roots.csv';
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Category Roots';
    }

}
