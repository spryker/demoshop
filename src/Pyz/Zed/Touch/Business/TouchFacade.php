<?php


namespace Pyz\Zed\Touch\Business;

use ProjectA\Zed\Product\Dependency\Facade\ProductToTouchInterface;
use SprykerCore\Zed\Touch\Business\TouchFacade as CoreTouchFacade;

class TouchFacade extends CoreTouchFacade implements ProductToTouchInterface
{

}
