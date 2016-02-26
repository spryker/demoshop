<?php

namespace Pyz\Zed\Installer\Business\Icecat\Installer;

use Pyz\Zed\Installer\Business\Icecat\AbstractIcecatInstaller;
use Spryker\Shared\Library\Reader\Csv\CsvBatchIterator;
use Symfony\Component\Console\Output\OutputInterface;

class CategoryRootInstaller extends AbstractIcecatInstaller
{
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

    /**
     * @return \Spryker\Zed\Propel\Business\Model\CountableIteratorInterface
     */
    protected function getBatchIterator()
    {
        return new CsvBatchIterator($this->getCsvDataFilename());
    }


}
