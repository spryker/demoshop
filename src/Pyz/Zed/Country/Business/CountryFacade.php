<?php

namespace Pyz\Zed\Country\Business;

use SprykerFeature\Zed\Country\Business\CountryFacade as SprykerCountryFacade;
use SprykerFeature\Zed\Customer\Dependency\Facade\CustomerToCountryInterface;

class CountryFacade extends SprykerCountryFacade implements
    CustomerToCountryInterface
{

}
