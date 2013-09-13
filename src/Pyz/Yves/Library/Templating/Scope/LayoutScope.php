<?php
namespace Pyz\Yves\Library\Templating\Scope;

use ProjectA\Yves\Library\Templating\Scope\Helper\PriceHelperTrait;
use ProjectA\Yves\Library\Templating\Scope\Helper\UrlHelperTrait;
use ProjectA\Yves\Library\Templating\Scope\LayoutScope as CoreLayoutScope;

/**
 * Everything in here is available to the template
 */
class LayoutScope extends CoreLayoutScope
{
    use UrlHelperTrait;
    use PriceHelperTrait;
}
