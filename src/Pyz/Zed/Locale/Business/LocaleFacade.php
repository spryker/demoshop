<?php


namespace Pyz\Zed\Locale\Business;

use ProjectA\Zed\Product\Dependency\Facade\ProductToLocaleInterface;
use SprykerCore\Zed\Locale\Business\LocaleFacade as CoreLocaleFacade;

class LocaleFacade extends CoreLocaleFacade implements ProductToLocaleInterface
{

}
