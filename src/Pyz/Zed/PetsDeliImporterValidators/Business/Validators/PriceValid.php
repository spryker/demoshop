<?php

namespace Pyz\Zed\PetsDeliImporterValidators\Business\Validators;

use PavFeature\Zed\ProductDynamicImporter\Business\Validator\ValidationRules\ValidationRuleInterface;
use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterAbstractProductInterface;
use Pyz\Zed\PetsDeliImporterValidators\Business\ValidationErrors\ErrorResultCollection;
use Pyz\Zed\PetsDeliImporterValidators\Business\ValidationErrors\ErrorResultElement;

class PriceValid implements ValidationRuleInterface
{
    const PRICE_PATTERN = '#^[0-9]{1,}$#';

    private $product;

    /**
     * @param PavProductDynamicImporterAbstractProductInterface $product
     */
    public function __construct(PavProductDynamicImporterAbstractProductInterface $product)
    {
        $this->product = $product;
    }

    /**
     * @return ErrorResultCollection
     */
    public function runRule()
    {
        $validationErrorCollection = new ErrorResultCollection();

        // only concrete products needs to be checked, abstract products don't have a price property
        foreach ($this->product->getConcreteProducts() as $concreteProduct) {
            $validationErrorCollection->addResultCollection(
                $this->checkPrice($concreteProduct->getSku(), $concreteProduct->getPrice())
            );
        }

        return $validationErrorCollection;
    }

    /**
     * @param string $sku
     * @param int $price
     * @return ErrorResultCollection
     */
    private function checkPrice($sku, $price)
    {
        $validationErrorCollection = new ErrorResultCollection();

        if (empty($price) === true) {
            $validationErrorCollection->addResultElement(
                new ErrorResultElement($sku, 'price can not be empty')
            );
        } elseif ((bool)preg_match(self::PRICE_PATTERN, $price) === false) {
            $validationErrorCollection->addResultElement(
                new ErrorResultElement($sku, 'price is not of correct format')
            );
        }
        return $validationErrorCollection;
    }
}