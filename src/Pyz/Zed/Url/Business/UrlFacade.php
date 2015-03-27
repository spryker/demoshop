<?php


namespace Pyz\Zed\Url\Business;

use ProjectA\Zed\Product\Dependency\Facade\ProductToUrlInterface;
use SprykerFeature\Zed\Url\Business\UrlFacade as CoreUrlFacade;

class UrlFacade extends CoreUrlFacade implements ProductToUrlInterface
{

}
