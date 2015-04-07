<?php

namespace Pyz\Zed\Locale\Business;

use ProjectA\Zed\Category\Dependency\Facade\CategoryToLocaleInterface;
use ProjectA\Zed\Product\Dependency\Facade\ProductToLocaleInterface;
use ProjectA\Zed\ProductCategory\Dependency\Facade\ProductCategoryToLocaleInterface;
use ProjectA\Zed\ProductSearch\Dependency\Facade\ProductSearchToLocaleInterface;
use SprykerCore\Zed\Locale\Business\LocaleFacade as SprykerLocaleFacade;
use SprykerFeature\Zed\Url\Dependency\UrlToLocaleInterface;

class LocaleFacade extends SprykerLocaleFacade implements
    CategoryToLocaleInterface,
    ProductCategoryToLocaleInterface,
    ProductSearchToLocaleInterface,
    ProductToLocaleInterface,
    UrlToLocaleInterface
{

}
