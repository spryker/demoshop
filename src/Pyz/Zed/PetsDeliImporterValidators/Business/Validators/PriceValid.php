<?php

namespace Pyz\Zed\PetsDeliImporterValidators\Business\Validators;

use PavFeature\Zed\ProductDynamicImporter\Business\Validator\ValidationRules\ValidationRuleInterface;
use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterAbstractProductInterface;
use PavFeature\Zed\PetsDeliImporterValidators\Business\ValidationErrors\ErrorResultCollection;
use PavFeature\Zed\ProductDynamicImporter\Business\Model\Error\ErrorResultElement;
use Generated\Shared\Transfer\PavProductDynamicImporterConcreteProductTransfer;

class PriceValid implements ValidationRuleInterface
{
    const PRICE_PATTERN = '#[0-9]{1,}#';

    private $product;

    public function __construct(PavProductDynamicImporterAbstractProductInterface $product)
    {
        $this->product = $product;
    }

    /**
     * @param PavProductDynamicImporterConcreteProductTransfer $concreteProduct
     * @return ErrorResultCollection
     */
    public function checkPrice(PavProductDynamicImporterConcreteProductTransfer $concreteProduct)
    {
        $validationErrorCollection = new ErrorResultCollection();

        if (empty($concreteProduct->getPrice()) === true)
        {
            $validationErrorCollection->addResultElement(
                $concreteProduct->getSku(),
                new ErrorResultElement('price is empty')
            );
        }
        elseif (preg_match(self::PRICE_PATTERN, $concreteProduct->getPrice()) === false)
        {
            $validationErrorCollection->addResultElement(
                $concreteProduct->getSku(),
                new ErrorResultElement('price is not of correct format')
            );
        }
        return $validationErrorCollection;
    }

    public function runRule()
    {
        $validationErrorCollection = new ErrorResultCollection();

        // only concrete products needs to be checked, abstract products don't have a price property
        foreach ($this->product->getConcreteProducts() as $concreteProduct) {
            $validationErrorCollection->addResultElement($this->checkPrice($concreteProduct));
        }

        return $validationErrorCollection;
    }
}