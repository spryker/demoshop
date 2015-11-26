<?php

namespace Pyz\Zed\Country\Business;

use Pyz\Zed\Shipment\Dependency\Facade\ShipmentToCountryInterface;
use SprykerFeature\Zed\Country\Business\CountryFacade as SprykerCountryFacade;
use SprykerFeature\Zed\Customer\Dependency\Facade\CustomerToCountryInterface as SpyCustomerToCountryInterface;
use SprykerFeature\Zed\Sales\Dependency\Facade\SalesToCountryInterface;
use Pyz\Zed\Customer\Dependency\Facade\CustomerToCountryInterface;

class CountryFacade extends SprykerCountryFacade implements
    SpyCustomerToCountryInterface,
    SalesToCountryInterface,
    CustomerToCountryInterface,
    ShipmentToCountryInterface
{

}
