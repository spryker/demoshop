<?php

namespace Pyz\Zed\Category\Business;

use Spryker\Zed\Category\Business\CategoryFacade as SprykerCategoryFacade;
use Psr\Log\LoggerInterface;

/**
 * @method \Pyz\Zed\Category\Business\CategoryBusinessFactory getFactory()
 */
class CategoryFacade extends SprykerCategoryFacade implements CategoryFacadeInterface
{

    /**
     * @param \Psr\Log\LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->getFactory()->createDemoDataInstaller($messenger)->install();
    }

}
