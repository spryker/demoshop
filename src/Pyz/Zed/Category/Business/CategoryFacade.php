<?php

namespace Pyz\Zed\Category\Business;

use ProjectA\Zed\Category\Business\CategoryDependencyContainer;
use ProjectA\Zed\Category\Business\CategoryFacade as SprykerCategoryFacade;
use ProjectA\Zed\ProductCategory\Dependency\Facade\ProductCategoryToCategoryInterface;

class CategoryFacade extends SprykerCategoryFacade implements ProductCategoryToCategoryInterface
{

    /**
     * @var CategoryDependencyContainer
     */
    protected $dependencyContainer;

}
