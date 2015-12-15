<?php

namespace Pyz\Zed\Country\Business;

use Spryker\Zed\Country\Business\CountryFacade as SprykerCountryFacade;
use Spryker\Zed\Customer\Dependency\Facade\CustomerToCountryInterface;
use Spryker\Zed\Sales\Dependency\Facade\SalesToCountryInterface;

class CountryFacade extends SprykerCountryFacade implements
    CustomerToCountryInterface,
    SalesToCountryInterface
{
}
