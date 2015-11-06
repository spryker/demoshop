<?php

namespace Pyz\Zed\Url\Business;

use Pyz\Zed\CmsBlock\Dependency\Facade\CmsBlockToUrlInterface;
use SprykerFeature\Zed\Category\Dependency\Facade\CategoryToUrlInterface;
use SprykerFeature\Zed\Product\Dependency\Facade\ProductToUrlInterface;
use SprykerFeature\Zed\Cms\Dependency\Facade\CmsToUrlInterface;
use SprykerFeature\Zed\Url\Business\UrlFacade as SprykerUrlFacade;

class UrlFacade extends SprykerUrlFacade implements
    CategoryToUrlInterface,
    CmsToUrlInterface,
    CmsBlockToUrlInterface,
    ProductToUrlInterface
{

}
