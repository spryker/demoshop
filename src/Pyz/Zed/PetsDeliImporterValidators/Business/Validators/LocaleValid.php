<?php

namespace Pyz\Zed\PetsDeliImporterValidators\Business\Validators;

use PavFeature\Zed\ProductDynamicImporter\Business\Validator\ValidationRules\ValidationRuleInterface;
use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterAbstractProductInterface;
use Pyz\Zed\PetsDeliImporterValidators\Business\ValidationErrors\ErrorResultCollection;
use Pyz\Zed\PetsDeliImporterValidators\Business\ValidationErrors\ErrorResultElement;

class LocaleValid implements ValidationRuleInterface
{
    const LOCALE_PATTERN = '#[a-z]{2}_[A-Z]{2}#';

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
     * @param array $locales
     * @return ErrorResultCollection
     */
    private function checkLocales($sku, $locales)
    {
        $validationErrorCollection = new ErrorResultCollection();

        if((is_array($locales) || $locales instanceof \ArrayObject) === false)
        {
            $validationErrorCollection->addResultElement(
                new ErrorResultElement($sku, 'locales must be of type array')
            );
        }
        elseif (count($locales) <= 0)
        {
            $validationErrorCollection->addResultElement(
                new ErrorResultElement($sku, 'At least one locale needs to be set')
            );
        }
        else
        {
            foreach($locales as $locale)
            {
                if(preg_match(self::LOCALE_PATTERN, $locale->getName()) === false)
                {
                    $validationErrorCollection->addResultElement(
                        new ErrorResultElement($sku, 'Locale is not correctly formatted')
                    );
                }
            }
        }

        return $validationErrorCollection;
    }

    /**
     * @return ErrorResultCollection
     */
    public function runRule()
    {
        $validationErrorCollection = new ErrorResultCollection();

        // step 1: check locales for abstract product
        $validationErrorCollection->addResultCollection(
            $this->checkLocales($this->product->getSku(), $this->product->getLocales())
        );

        // step 2: check locales for concrete product
        foreach ($this->product->getConcreteProducts() as $concreteProduct)
        {
            $validationErrorCollection->addResultCollection(
                $this->checkLocales($concreteProduct->getSku(), $concreteProduct->getLocales())
            );
        }

        return $validationErrorCollection;
    }
}