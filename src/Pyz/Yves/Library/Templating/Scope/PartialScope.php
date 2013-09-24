<?php
namespace Pyz\Yves\Library\Templating\Scope;

use ProjectA\Yves\Library\Templating\Scope\Helper\PriceHelperTrait;
use ProjectA\Yves\Library\Templating\Scope\Helper\UrlHelperTrait;
use ProjectA\Yves\Library\Templating\Scope\PartialScope as CorePartialScope;

/**
 * Everything in here is available to the template
 */
class PartialScope extends CorePartialScope
{
    use UrlHelperTrait;
    use PriceHelperTrait;

}
