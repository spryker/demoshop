<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Stock\Business;

use Spryker\Zed\Stock\Business\StockFacadeInterface as SprykerStockFacadeInterface;
use Psr\Log\LoggerInterface;

interface StockFacadeInterface extends SprykerStockFacadeInterface
{

    /**
     * @param \Psr\Log\LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger);

}
