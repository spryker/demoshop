<?php

namespace Pyz\Zed\PetsDeliImporterValidators\Business;

use SprykerEngine\Zed\Kernel\Business\AbstractBusinessDependencyContainer;
use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterAbstractProductInterface;

class PetsDeliImporterValidatorsDependencyContainer extends AbstractBusinessDependencyContainer
{
    /**
     * @param PavProductDynamicImporterAbstractProductInterface $product
     * @return mixed
     */
    public function getPetsDeliValidatorsProvider(PavProductDynamicImporterAbstractProductInterface $product)
    {
        return $this->getFactory()->createValidatorsProviderPetsDeliValidatorsProvider(
            $this->getFactory()->createValidatorsLocaleValid($product),
            $this->getFactory()->createValidatorsPriceValid($product),
            $this->getFactory()->createValidatorsTaxValid($product),
            $this->getFactory()->createValidatorsSkuValid($product),
            $this->getFactory()->createValidatorsAbstractProductTypeValid($product)
        );
    }
}