<?php

namespace Pyz\Zed\Category\Communication;

use ProjectA\Zed\Category\Communication\CategoryDependencyContainer as ProjectACategoryDependencyContainer;
use Pyz\Zed\Category\Business\CategoryFacade;

class CategoryDependencyContainer extends ProjectACategoryDependencyContainer
{

    /**
     * @return CategoryFacade
     */
    public function getInstallerFacade()
    {
        return $this->locator->category()->facade();
    }
}
