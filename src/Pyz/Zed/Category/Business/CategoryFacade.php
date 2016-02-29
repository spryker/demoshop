<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Category\Business;

use Spryker\Zed\Category\Business\CategoryFacade as SprykerCategoryFacade;
use Spryker\Zed\Messenger\Business\Model\MessengerInterface;

/**
 * @method \Pyz\Zed\Category\Business\CategoryBusinessFactory getFactory()
 */
class CategoryFacade extends SprykerCategoryFacade implements CategoryFacadeInterface
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
