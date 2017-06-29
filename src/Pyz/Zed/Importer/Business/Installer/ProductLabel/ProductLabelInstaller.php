<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Installer\ProductLabel;

use Pyz\Zed\Importer\Business\Installer\AbstractInstaller;

class ProductLabelInstaller extends AbstractInstaller
{

    /**
     * @return \Spryker\Service\UtilDataReader\Model\BatchIterator\CountableIteratorInterface
     */
    protected function buildBatchIterator()
    {
        return $this->utilDataReaderService->getCsvBatchIterator(
            $this->dataDirectory . 'product_labels.csv'
        );
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Product Labels';
    }

}
