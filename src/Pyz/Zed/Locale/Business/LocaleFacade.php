<?php


namespace Pyz\Zed\Locale\Business;

use ProjectA\Zed\Category\Dependency\Facade\CategoryToLocaleInterface;
use ProjectA\Zed\Product\Dependency\Facade\ProductToLocaleInterface;
use ProjectA\Zed\ProductCategory\Dependency\Facade\ProductCategoryToLocaleInterface;
use SprykerCore\Zed\Locale\Business\LocaleFacade as CoreLocaleFacade;

class LocaleFacade extends CoreLocaleFacade implements ProductToLocaleInterface, CategoryToLocaleInterface, ProductCategoryToLocaleInterface
{

}
