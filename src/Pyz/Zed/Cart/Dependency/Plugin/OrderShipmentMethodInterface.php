<?php

namespace Pyz\Zed\Cart\Dependency\Plugin;

use Generated\Shared\Transfer\ExpenseTransfer;

interface OrderShipmentMethodInterface
{
    /**
     * @param string $countryIso2
     * @return ExpenseTransfer
     */
    public function getShipmentMethodByCountryIso2($countryIso2);
}
