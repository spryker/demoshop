<?php

namespace Pyz\Zed\PetsDeliImporterValidators\Business;

use SprykerEngine\Zed\Kernel\Business\AbstractFacade;
use PavFeature\Zed\ProductDynamicImporter\Business\Validator\ValidationRuleSetProviderInterface;
use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterAbstractProductInterface;

class PetsDeliImporterValidatorsFacade extends AbstractFacade implements ValidationRuleSetProviderInterface
{
    /**
     * @param PavProductDynamicImporterAbstractProductInterface $product
     * @return array
     */
    public function getRuleSet(PavProductDynamicImporterAbstractProductInterface $product)
    {
        return $this->getDependencyContainer()->getPetsDeliValidatorsProvider($product)->getRuleSets();
    }
}