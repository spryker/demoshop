<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Importer\Business\Installer\Tax;

use Pyz\Zed\Importer\Business\Installer\AbstractInstaller;
use Spryker\Shared\Library\BatchIterator\CsvBatchIterator;

class TaxInstaller extends AbstractInstaller
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
    public function getTitle()
    {
        return 'Tax';
    }

    /**
     * @return string
     */
    protected function getCsvDataFilename()
    {
        return $this->dataDirectory . '/taxes.csv';
    }

}
