<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\ProductCategory\Business;

use Psr\Log\LoggerInterface;

interface ProductCategoryFacadeInterface
{

    /**
     * @param \Psr\Log\LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger);

}
