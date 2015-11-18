<?php

namespace Pyz\Zed\Price\Business\Model;

use Pyz\SprykerBugfixInterface;
use SprykerFeature\Zed\Price\Business\Model\Writer as SprykerWriter;

use Generated\Shared\Transfer\PriceProductTransfer;

class Writer extends SprykerWriter implements SprykerBugfixInterface
{


    /**
     * @param PriceProductTransfer $priceProductTransfer
     *
     * @throws \Exception
     */
    public function setPriceForProduct(PriceProductTransfer $priceProductTransfer)
    {
        $priceProductTransfer = $this->setPriceType($priceProductTransfer);

        if (
            $this->isPriceTypeExistingForConcreteProduct($priceProductTransfer)
            || $this->isPriceTypeExistingForAbstractProduct($priceProductTransfer)
        ) {
            $this->loadAbstractProductIdForPriceProductTransfer($priceProductTransfer);
            $this->loadConcreteProductIdForPriceProductTransfer($priceProductTransfer);

            $priceProductEntity = $this->getPriceProductById($priceProductTransfer->getIdPriceProduct());
            $this->savePriceProductEntity($priceProductTransfer, $priceProductEntity);

            if ($priceProductTransfer->getIdProduct()) {
                $this->insertTouchRecord(self::TOUCH_PRODUCT, $priceProductTransfer->getIdProduct());
            }
        } else {
            throw new \Exception('No price existing for the product');
        }
    }
}
