<?php
namespace Pyz\Yves\Library\Templating\Scope;

use ProjectA\Yves\Library\Templating\Scope\Helper\PriceHelperTrait;
use ProjectA\Yves\Library\Templating\Scope\Helper\UrlHelperTrait;
use ProjectA\Yves\Library\Templating\Scope\TemplateScope as CoreTemplateScope;

/**
 * Everything in here is available to the template
 */
class TemplateScope extends CoreTemplateScope
{
    use UrlHelperTrait;
    use PriceHelperTrait;
}
