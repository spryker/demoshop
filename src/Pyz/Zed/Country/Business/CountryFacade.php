<?php

namespace Pyz\Zed\Country\Business;

use Pyz\Zed\ProductCountry\Dependency\ProductCountryToCountryInterface;
use SprykerFeature\Zed\Country\Business\CountryFacade as SprykerCountryFacade;
use SprykerFeature\Zed\Customer\Dependency\Facade\CustomerToCountryInterface;
use SprykerFeature\Zed\Sales\Dependency\Facade\SalesToCountryInterface;

class CountryFacade extends SprykerCountryFacade implements
    CustomerToCountryInterface,
    SalesToCountryInterface,
    ProductCountryToCountryInterface
{
}
