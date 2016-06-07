<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */


namespace Pyz\Zed\Importer\Business\Installer\Discount;

use Pyz\Zed\Importer\Business\Installer\AbstractInstaller;
use Spryker\Shared\Library\BatchIterator\YamlBatchIterator;

class DiscountInstaller extends AbstractInstaller
{

    /**
     * @return \Spryker\Shared\Library\BatchIterator\CountableIteratorInterface
     */
    protected function buildBatchIterator()
    {
        return new YamlBatchIterator($this->getYamlDataFilename());
    }

    /**
     * @return string
     */
    protected function getYamlDataFilename()
    {
        return $this->dataDirectory . '/discounts.yml';
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Discount';
    }
}
