<?php

namespace Pyz\Zed\Cart\Dependency\Plugin;

interface OrderShipmentMethodInterface
{
    public function getShipmentMethodByCountry($countryId);
}
