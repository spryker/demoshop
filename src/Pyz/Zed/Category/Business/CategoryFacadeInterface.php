<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Category\Business;

use Spryker\Zed\Category\Business\CategoryFacadeInterface as SprykerCategoryFacadeInterface;
use Psr\Log\LoggerInterface;

interface CategoryFacadeInterface extends SprykerCategoryFacadeInterface
{

    /**
     * @param \Psr\Log\LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger);

}
