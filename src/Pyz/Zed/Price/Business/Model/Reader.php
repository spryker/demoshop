<?php

namespace Pyz\Zed\Price\Business\Model;

use Pyz\SprykerBugfixInterface;
use SprykerFeature\Zed\Price\Business\Model\Reader as SprykerReader;

class Reader extends SprykerReader implements ReaderInterface, SprykerBugfixInterface
{

    /**
     * @param string $sku
     * @param string $priceTypeName
     *
     * @throws \Exception
     *
     * @return int
     */
    public function getProductPriceIdBySku($sku, $priceTypeName = null)
    {
        $priceTypeName = $this->handleDefaultPriceType($priceTypeName);
        $priceTypeEntity = $this->getPriceTypeByName($priceTypeName);

        return $this->queryContainer
            ->queryPriceEntityForConcreteProduct($sku, $priceTypeEntity)
            ->findOne()
            ->getIdPriceProduct();
    }
}
