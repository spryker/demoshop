<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\ProductOption\Business;

use Psr\Log\LoggerInterface;

interface ProductOptionFacadeInterface
{

    /**
     * @param \Psr\Log\LoggerInterface $messenger
     *
     * @return \Pyz\Zed\ProductOption\Business\Internal\DemoData\ProductOptionDataInstall
     */
    public function installDemoData(LoggerInterface $messenger);

}
