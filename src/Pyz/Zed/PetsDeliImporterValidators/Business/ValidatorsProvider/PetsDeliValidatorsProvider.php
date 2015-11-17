<?php

namespace Pyz\Zed\PetsDeliImporterValidators\Business\ValidatorsProvider;

use Pyz\Zed\PetsDeliImporterValidators\Business\Validators\LocaleValid;
use Pyz\Zed\PetsDeliImporterValidators\Business\Validators\PriceValid;
use Pyz\Zed\PetsDeliImporterValidators\Business\Validators\TaxValid;
use Pyz\Zed\PetsDeliImporterValidators\Business\Validators\SkuValid;
use Pyz\Zed\PetsDeliImporterValidators\Business\Validators\AbstractProductTypeValid;

class PetsDeliValidatorsProvider
{
    private $localeValid;
    private $priceValid;
    private $taxValid;
    private $skuValid;
    private $abstractProductTypeValid;

    /**
     * @param LocaleValid $localeValid
     * @param PriceValid $priceValid
     * @param TaxValid $taxValid
     * @param SkuValid $skuValid
     * @param AbstractProductTypeValid $abstractProductTypeValid
     */
    public function __construct(
        LocaleValid $localeValid,
        PriceValid $priceValid,
        TaxValid $taxValid,
        SkuValid $skuValid,
        AbstractProductTypeValid $abstractProductTypeValid)
    {
        $this->localeValid = $localeValid;
        $this->priceValid = $priceValid;
        $this->taxValid = $taxValid;
        $this->skuValid = $skuValid;
        $this->abstractProductTypeValid = $abstractProductTypeValid;
    }

    /**
     * @return array
     */
    public function getRuleSets()
    {
        return [
            $this->localeValid,
            $this->priceValid,
            $this->taxValid,
            $this->skuValid,
            $this->abstractProductTypeValid
        ];
    }
}