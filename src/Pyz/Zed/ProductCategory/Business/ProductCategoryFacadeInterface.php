<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\ProductCategory\Business;

use Spryker\Zed\ProductCategory\Business\ProductCategoryFacadeInterface as SprykerProductCategoryFacadeInterface;
use Psr\Log\LoggerInterface;

interface ProductCategoryFacadeInterface extends SprykerProductCategoryFacadeInterface
{

    /**
     * @param \Psr\Log\LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger);

}
