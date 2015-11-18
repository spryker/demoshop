<?php

namespace Pyz\Zed\ProductCountry\Business;

use SprykerEngine\Zed\Kernel\Business\AbstractFacade;

/**
 * @method ProductCountryDependencyContainer getDependencyContainer()
 */
class ProductCountryFacade extends AbstractFacade
{

    /**
     * @param array $productCountryData
     *
     * @return void
     */
    public function importProductCountryData(array $productCountryData)
    {
        $this->getDependencyContainer()
            ->createProductCountryManager()
            ->importProductCountryData($productCountryData);
    }

}
