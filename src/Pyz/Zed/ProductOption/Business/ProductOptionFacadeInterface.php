<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
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
