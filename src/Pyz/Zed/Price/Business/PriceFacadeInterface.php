<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Price\Business;

use Psr\Log\LoggerInterface;
use Spryker\Zed\Price\Business\PriceFacadeInterface as SprykerPriceFacadeInterface;

interface PriceFacadeInterface extends SprykerPriceFacadeInterface
{

    /**
     * @param \Psr\Log\LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger);

}
