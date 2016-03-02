<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
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
