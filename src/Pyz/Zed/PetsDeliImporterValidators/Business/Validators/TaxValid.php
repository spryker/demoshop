<?php

namespace Pyz\Zed\PetsDeliImporterValidators\Business\Validators;

use PavFeature\Zed\ProductDynamicImporter\Business\Validator\ValidationRules\ValidationRuleInterface;
use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterAbstractProductInterface;
use Pyz\Zed\PetsDeliImporterValidators\Business\ValidationErrors\ErrorResultCollection;
use Pyz\Zed\PetsDeliImporterValidators\Business\ValidationErrors\ErrorResultElement;

class TaxValid implements ValidationRuleInterface
{
    const TAX_PATTERN = '#^[0-9]{1,2}\.[0-9]{2}$#';

    private $product;

    /**
     * @param PavProductDynamicImporterAbstractProductInterface $product
     */
    public function __construct(PavProductDynamicImporterAbstractProductInterface $product)
    {
        $this->product = $product;
    }

    /**
     * @param $sku
     * @param $tax
     * @return ErrorResultCollection
     */
    public function checkTax($sku, $tax)
    {
        $validationErrorCollection = new ErrorResultCollection();

        if(empty($tax))
        {
            $validationErrorCollection->addResultElement(
                new ErrorResultElement($sku, 'Tax can not be empty')
            );
        }

        if((bool)preg_match(self::TAX_PATTERN, $tax) === false)
        {
            $validationErrorCollection->addResultElement(
                new ErrorResultElement($sku, 'Tax is not of correct format')
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
            $this->checkTax($this->product->getSku(), $this->product->getTax())
        );

        return $validationErrorCollection;
    }
}