<?php


namespace Pyz\Zed\Touch\Business;

use ProjectA\Zed\Category\Dependency\Facade\CategoryToTouchInterface;
use ProjectA\Zed\Product\Dependency\Facade\ProductToTouchInterface;
use SprykerCore\Zed\Touch\Business\TouchFacade as CoreTouchFacade;
use SprykerFeature\Zed\Url\Dependency\UrlToTouchInterface;

class TouchFacade extends CoreTouchFacade implements
    ProductToTouchInterface,
    UrlToTouchInterface,
    CategoryToTouchInterface
{

}
