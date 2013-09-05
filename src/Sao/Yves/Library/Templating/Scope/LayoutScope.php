<?php
namespace Sao\Yves\Library\Templating\Scope;

use ProjectA\Yves\Library\Templating\Scope\Helper\UrlGeneratorTrait;
use ProjectA\Yves\Library\Templating\Scope\LayoutScope as CoreLayoutScope;

/**
 * Everything in here is available to the template
 *
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class LayoutScope extends CoreLayoutScope
{
    use UrlGeneratorTrait;
}
