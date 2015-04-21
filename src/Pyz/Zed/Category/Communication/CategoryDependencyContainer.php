<?php

namespace Pyz\Zed\Category\Communication;

use SprykerFeature\Zed\Category\Communication\CategoryDependencyContainer as SprykerFeatureCategoryDependencyContainer;
use Pyz\Zed\Category\Business\CategoryFacade;

class CategoryDependencyContainer extends SprykerFeatureCategoryDependencyContainer
{

    /**
     * @return CategoryFacade
     */
    public function getInstallerFacade()
    {
        return $this->getLocator()->category()->facade();
    }
}
