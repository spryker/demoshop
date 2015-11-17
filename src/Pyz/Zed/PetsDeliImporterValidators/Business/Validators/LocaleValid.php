<?php

namespace Pyz\Zed\PetsDeliImporterValidators\Business\Validators;

use PavFeature\Zed\ProductDynamicImporter\Business\Validator\ValidationRules\ValidationRuleInterface;
use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterAbstractProductInterface;
use PavFeature\Zed\PetsDeliImporterValidators\Business\ValidationErrors\ErrorResultCollection;

class LocaleValid implements ValidationRuleInterface
{
    const LOCALE_PP

    private $product;

    public function __construct(PavProductDynamicImporterAbstractProductInterface $product)
    {
        $this->product = $product;
    }

    public function checkLocales()
    {
        $validationErrorCollection = new ErrorResultCollection();
    }

    public function runRule()
    {
        $validationErrorCollection = new ErrorResultCollection();

        // step 1: check locales for abstract product
        $this->product->getLocales()

        // step 2: check locales for concrete product
        foreach ($this->product->getConcreteProducts() as $concreteProduct)
        {
            if (count($concreteProduct->getLocales()) <= 0)
            {
                $validationErrorCollection->addResultElement(
                    $concreteProduct->getSku(),
                    new ErrorResultElement('At least one locale needs to be set')
                );
            }
            else
            {
                foreach($concreteProduct->getLocales() as $locale)
                {
                    $locale->getName()
                }
            }
        }

        return $validationErrorCollection;
    }
}