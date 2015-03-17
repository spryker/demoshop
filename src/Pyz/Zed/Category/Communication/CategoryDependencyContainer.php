<?php

namespace Pyz\Zed\Category\Communication;

use ProjectA\Zed\Kernel\Communication\AbstractDependencyContainer;
use Pyz\Zed\Category\Business\CategoryFacade;

class CategoryDependencyContainer extends AbstractDependencyContainer
{

    /**
     * @return CategoryFacade
     */
    public function getInstallerFacade()
    {
        return $this->locator->category()->facade();
    }
}
