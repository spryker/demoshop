<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\ProductCategory\Business;

use Spryker\Zed\ProductCategory\Business\ProductCategoryFacadeInterface as SprykerProductCategoryFacadeInterface;
use Spryker\Zed\Messenger\Business\Model\MessengerInterface;

interface ProductCategoryFacadeInterface extends SprykerProductCategoryFacadeInterface
{

    /**
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     *
     * @return void
     */
    public function installDemoData(MessengerInterface $messenger);

}
