<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Category\Business;

use Spryker\Zed\Category\Business\CategoryFacadeInterface as SprykerCategoryFacadeInterface;
use Spryker\Zed\Messenger\Business\Model\MessengerInterface;

interface CategoryFacadeInterface extends SprykerCategoryFacadeInterface
{

    /**
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     *
     * @return void
     */
    public function installDemoData(MessengerInterface $messenger);

}
