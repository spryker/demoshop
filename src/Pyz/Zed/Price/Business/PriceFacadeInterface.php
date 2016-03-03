<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Price\Business;

use Spryker\Zed\Price\Business\PriceFacadeInterface as SprykerPriceFacadeInterface;
use Spryker\Zed\Messenger\Business\Model\MessengerInterface;
use Spryker\Zed\Price\Business\PriceFacadeInterface as SprykerPriceFacadeInterface;

interface PriceFacadeInterface extends SprykerPriceFacadeInterface
{

    /**
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     *
     * @return void
     */
    public function installDemoData(MessengerInterface $messenger);

}
