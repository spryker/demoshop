<?php

namespace Pyz\Zed\PetsDeliImporterValidators\Business\Validators;

use PavFeature\Zed\ProductDynamicImporter\Business\Validator\ValidationRules\ValidationRuleInterface;
use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterAbstractProductInterface;
use Pyz\Zed\PetsDeliImporterValidators\Business\ValidationErrors\ErrorResultCollection;
use Pyz\Zed\PetsDeliImporterValidators\Business\ValidationErrors\ErrorResultElement;

class SkuValid implements ValidationRuleInterface
{
    private $product;

    /**
     * @param PavProductDynamicImporterAbstractProductInterface $product
     */
    public function __construct(PavProductDynamicImporterAbstractProductInterface $product)
    {
        $this->product = $product;
    }

    /**
     * @param string $sku
     * @return ErrorResultCollection
     */
    private function checkSku($sku)
    {
        $validationErrorCollection = new ErrorResultCollection();
        if((is_string($sku) || is_numeric($sku)) === false)
        {
            $validationErrorCollection->addResultElement(
                new ErrorResultElement($sku, 'Sku has to be of type string or numeric')
            );
        }

        if(empty($sku))
        {
            $validationErrorCollection->addResultElement(
                new ErrorResultElement($sku, 'Sku can not be empty')
            );
        }

        return $validationErrorCollection;
    }

    /**
     * @return ErrorResultCollection
     */
    public function runRule()
    {
        $validationErrorCollection = new ErrorResultCollection();
        $validationErrorCollection->addResultCollection(
            $this->checkSku($this->product->getSku())
        );
        return $validationErrorCollection;
    }
}