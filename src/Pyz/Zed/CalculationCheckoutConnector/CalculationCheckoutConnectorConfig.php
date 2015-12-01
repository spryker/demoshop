<?php

namespace Pyz\Zed\CalculationCheckoutConnector;

use SprykerFeature\Zed\CalculationCheckoutConnector\CalculationCheckoutConnectorConfig as SprykerCalculationCheckoutConnectorConfig;
use Pyz\Shared\CalculationCheckoutConnector\CalculationCheckoutConnectorConfig as SharedCalculationCheckoutConnectorConfig;

class CalculationCheckoutConnectorConfig extends SprykerCalculationCheckoutConnectorConfig
{
    public function getMinimumCheckoutCartValue()
    {
        return $this->get(SharedCalculationCheckoutConnectorConfig::MINIMUM_CHECKOUT_CART_VALUE);
    }
}
