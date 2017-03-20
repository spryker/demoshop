<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Installer\Discount;

use Pyz\Zed\Importer\Business\Installer\AbstractInstaller;
use Spryker\Service\UtilDataReader\Model\BatchIterator\XmlBatchIterator;

class DiscountInstaller extends AbstractInstaller
{

    /**
     * @return \Spryker\Service\UtilDataReader\Model\BatchIterator\CountableIteratorInterface
     */
    protected function buildBatchIterator()
    {
        return new XmlBatchIterator($this->getXmlDataFilename(), 'discount');
    }

    /**
     * @return string
     */
    protected function getXmlDataFilename()
    {
        return $this->dataDirectory . '/discounts.xml';
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Discount';
    }

}
