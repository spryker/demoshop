<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Stock\Business;

use Spryker\Zed\Messenger\Business\Model\MessengerInterface;

interface StockFacadeInterface
{

    /**
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     */
    public function installDemoData(MessengerInterface $messenger);

}
