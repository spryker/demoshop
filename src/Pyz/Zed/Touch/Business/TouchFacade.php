<?php


namespace Pyz\Zed\Touch\Business;

use SprykerCore\Zed\Touch\Business\TouchFacade as CoreTouchFacade;
use SprykerFeature\Zed\Glossary\Dependency\Facade\GlossaryToTouchInterface;

class TouchFacade extends CoreTouchFacade implements GlossaryToTouchInterface
{

}
