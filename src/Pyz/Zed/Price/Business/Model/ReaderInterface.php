<?php

namespace Pyz\Zed\Price\Business\Model;

use SprykerFeature\Zed\Price\Business\Model\ReaderInterface as SprykerInterface;

interface ReaderInterface extends SprykerInterface
{
    /**
     * @param string $sku
     * @param string $priceTypeName
     *
     * @return int
     */
    public function getProductPriceIdBySku($sku, $priceTypeName = null);

}
