<?php

namespace Pyz\Zed\Customer\Business\MagentoDataImporter;

interface CsvReaderInterface
{
    /**
     * @return int
     */
    public function importData();
}
