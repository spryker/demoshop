<?php


namespace Pyz\Zed\Touch\Business;

use ProjectA\Zed\Glossary\Dependency\Facade\GlossaryToTouchInterface;
use SprykerCore\Zed\Touch\Business\TouchFacade as CoreTouchFacade;

class TouchFacade extends CoreTouchFacade implements GlossaryToTouchInterface
{

}
