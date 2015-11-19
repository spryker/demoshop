<?php

namespace Pyz\Zed\PetsDeliImporterValidators\Business\Validators;

use PavFeature\Zed\ProductDynamicImporter\Business\Validator\ValidationRules\ValidationRuleInterface;
use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterAbstractProductInterface;
use Pyz\Zed\PetsDeliImporterValidators\Business\ValidationErrors\ErrorResultCollection;
use Pyz\Zed\PetsDeliImporterValidators\Business\ValidationErrors\ErrorResultElement;
use PavFeature\Zed\ProductDynamic\ProductDynamicConfig;

class AbstractProductTypeValid implements ValidationRuleInterface
{
    const ALLOWED_TYPES = [
        ProductDynamicConfig::DYNAMIC_PRODUCT_TYPE_SIMPLE,
        ProductDynamicConfig::DYNAMIC_PRODUCT_TYPE_DYNAMIC,
        ProductDynamicConfig::DYNAMIC_PRODUCT_TYPE_BUNDLE
    ];

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

        $validationErrorCollection->addResultCollection(
            $this->checkType($this->product->getSku(), $this->product->getType())
        );

        return $validationErrorCollection;
    }

    /**
     * @param string $sku
     * @param string $type
     * @return ErrorResultCollection
     */
    public function checkType($sku, $type)
    {
        $validationErrorCollection = new ErrorResultCollection();
        if (in_array($type, self::ALLOWED_TYPES) === false) {
            $validationErrorCollection->addResultElement(
                new ErrorResultElement($sku, 'abstract product should be of one of these types:' . implode(', ', self::ALLOWED_TYPES))
            );
        }
        return $validationErrorCollection;
    }
}