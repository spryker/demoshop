<?php

namespace Pyz\Zed\ProductCountry\Business;

use Generated\Shared\Transfer\ProductCountryTransfer;
use SprykerEngine\Zed\Kernel\Business\AbstractFacade;

/**
 * @method ProductCountryDependencyContainer getDependencyContainer()
 */
class ProductCountryFacade extends AbstractFacade
{

    /**
     * @param ProductCountryTransfer[] $productCountries
     *
     * @return int
     */
    public function importProductCountryData(array $productCountries)
    {
        return $this->getDependencyContainer()
            ->createProductCountryManager()
            ->importProductCountryData($productCountries);
    }

    /**
     * @param ProductCountryTransfer $productCountryTransfer
     *
     * @return void
     */
    public function saveProductCountry(ProductCountryTransfer $productCountryTransfer)
    {
        $this->getDependencyContainer()
            ->createProductCountryManager()
            ->saveProductCountry($productCountryTransfer)
        ;
    }

}
