<?php

namespace Pyz\Client\Shipment\Service\Zed;

use Generated\Shared\Transfer\CountryTransfer;
use Generated\Shared\Transfer\ExpenseTransfer;

interface ShipmentStubInterface
{
    /**
     * @param CountryTransfer $countryTransfer
     * @return ExpenseTransfer
     */
    public function getShipmentMethod(CountryTransfer $countryTransfer);
}
