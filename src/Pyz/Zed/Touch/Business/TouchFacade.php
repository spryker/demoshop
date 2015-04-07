<?php

namespace Pyz\Zed\Touch\Business;

use ProjectA\Zed\Category\Dependency\Facade\CategoryToTouchInterface;
use ProjectA\Zed\Product\Dependency\Facade\ProductToTouchInterface;
use ProjectA\Zed\ProductSearch\Dependency\Facade\ProductSearchToTouchInterface;
use SprykerCore\Zed\Touch\Business\TouchFacade as SprykerTouchFacade;
use SprykerFeature\Zed\Url\Dependency\UrlToTouchInterface;

class TouchFacade extends SprykerTouchFacade implements
    CategoryToTouchInterface,
    ProductSearchToTouchInterface,
    ProductToTouchInterface,
    UrlToTouchInterface
{

}
