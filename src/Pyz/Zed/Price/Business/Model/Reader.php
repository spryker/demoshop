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
        $priceType = $this->getPriceTypeByName($priceTypeName);

        if ($this->hasPriceForConcreteProduct($sku, $priceType)) {
            return $this->queryContainer
                ->queryPriceEntityForConcreteProduct($sku, $priceType)
                ->findOne()
                ->getIdPriceProduct()
            ;
        } else {
            return $this->queryContainer
                ->queryPriceEntityForConcreteProduct($sku, $priceType)
                ->findOne()
                ->getIdPriceProduct()
            ;
        }
    }
}
