<?php

namespace Pyz\Zed\Cart\Dependency\Plugin;

use Generated\Shared\Transfer\ExpenseTransfer;

interface OrderShipmentMethodInterface
{
    /**
     * @param int $countryId
     * @return ExpenseTransfer
     */
    public function getShipmentMethodByCountry($countryId);
}
