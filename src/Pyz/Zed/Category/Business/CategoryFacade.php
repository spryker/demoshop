<?php

namespace Pyz\Zed\Category\Business;

use Spryker\Zed\Category\Business\CategoryFacade as SprykerCategoryFacade;
use Psr\Log\LoggerInterface;

/**
 * @method CategoryBusinessFactory getFactory()
 */
class CategoryFacade extends SprykerCategoryFacade
{

    /**
     * @param LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->getFactory()->createDemoDataInstaller($messenger)->install();
    }

}
