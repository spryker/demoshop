<?php

namespace Pyz\Zed\Url\Business;

use ProjectA\Zed\Category\Dependency\Facade\CategoryToUrlInterface;
use ProjectA\Zed\Product\Dependency\Facade\ProductToUrlInterface;
use sprykerfeature\Zed\Cms\Dependency\Facade\CmsToUrlInterface;
use SprykerFeature\Zed\Url\Business\UrlFacade as SprykerUrlFacade;

class UrlFacade extends SprykerUrlFacade implements
    CategoryToUrlInterface,
    CmsToUrlInterface,
    ProductToUrlInterface
{

}
