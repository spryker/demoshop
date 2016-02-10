<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Cms\Business;

use Spryker\Zed\Messenger\Business\Model\MessengerInterface;

interface CmsFacadeInterface
{

    /**
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     */
    public function installDemoData(MessengerInterface $messenger);

}
