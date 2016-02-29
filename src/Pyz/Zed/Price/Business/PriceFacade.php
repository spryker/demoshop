<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Price\Business;

use Psr\Log\LoggerInterface;
use Spryker\Zed\Messenger\Business\Model\MessengerInterface;
use Spryker\Zed\Price\Business\PriceFacade as SprykerPriceFacade;

/**
 * @method \Pyz\Zed\Price\Business\PriceBusinessFactory getFactory()
 */
class PriceFacade extends SprykerPriceFacade implements PriceFacadeInterface
{

    /**
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     *
     * @return void
     */
    public function installDemoData(MessengerInterface $messenger)
    {
        $this->getFactory()->createDemoDataInstaller($messenger)->install();
    }

}
