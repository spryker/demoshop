<?php

namespace Pyz\Zed\ProductCountry\Business\Model;

use Pyz\Zed\Country\Business\CountryFacade;
use Pyz\Zed\Product\Business\ProductFacade;

class ProductCountryManager implements ProductCountryManagerInterface
{

    /**
     * @var ProductFacade
     */
    protected $productFacade;

    /**
     * @var CountryFacade
     */
    protected $countryFacade;

    public function __construct(ProductFacade $productFacade, CountryFacade $countryFacade)
    {
        $this->productFacade = $productFacade;
        $this->countryFacade = $countryFacade;
    }

}
