<?php


namespace Pyz\Zed\Locale\Business;

use ProjectA\Zed\Glossary\Dependency\Facade\GlossaryToLocaleInterface;
use SprykerCore\Zed\Locale\Business\LocaleFacade as CoreLocaleFacade;

class LocaleFacade extends CoreLocaleFacade implements GlossaryToLocaleInterface
{

}
