<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\ProductOption\Business;

use Spryker\Zed\ProductOption\Business\ProductOptionFacadeInterface as SprykerProductOptionFacadeInterface;
use Spryker\Zed\Messenger\Business\Model\MessengerInterface;

interface ProductOptionFacadeInterface extends SprykerProductOptionFacadeInterface
{

    /**
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     *
     * @return void
     */
    public function installDemoData(MessengerInterface $messenger);

}
