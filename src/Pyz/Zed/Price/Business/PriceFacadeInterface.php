<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Price\Business;

use Spryker\Zed\Price\Business\PriceFacadeInterface as SprykerPriceFacadeInterface;
use Spryker\Zed\Messenger\Business\Model\MessengerInterface;

interface PriceFacadeInterface extends SprykerPriceFacadeInterface
{

    /**
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     *
     * @return void
     */
    public function installDemoData(MessengerInterface $messenger);

}
