<?php

namespace Pyz\Zed\Tax\Business\Model;


use Generated\Shared\Transfer\TaxRateTransfer;
use Generated\Shared\Transfer\TaxSetCollectionTransfer;
use Generated\Shared\Transfer\TaxSetTransfer;
use Propel\Runtime\Exception\PropelException;
use SprykerFeature\Zed\Tax\Business\Model\TaxReader as SprykerTaxReader;

class TaxReader extends SprykerTaxReader
{
    /**
     * @throws PropelException
     *
     * @return TaxSetCollectionTransfer
     */
    public function getTaxSets()
    {
        $propelCollection = $this->queryContainer->queryAllTaxsets()->find();

        $transferCollection = new TaxSetCollectionTransfer();

        foreach ($propelCollection as $taxSetEntity) {
            $taxSetTransfer = (new TaxSetTransfer())->fromArray($taxSetEntity->toArray());
            foreach ($taxSetEntity->getSpyTaxRates() as $taxRateEntity) {
                $taxRateTransfer = new TaxRateTransfer();
                $taxRateTransfer->fromArray($taxRateEntity->toArray());
                $taxSetTransfer->addTaxRate($taxRateTransfer);
            }
            $transferCollection->addTaxSet($taxSetTransfer);
        }

        return $transferCollection;
    }


}
