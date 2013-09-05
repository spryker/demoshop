<?php
namespace Sao\Yves\Library\Templating\Scope;

use ProjectA\Yves\Library\Templating\Scope\Helper\UrlGeneratorTrait;
use ProjectA\Yves\Library\Templating\Scope\PartialScope as CorePartialScope;

/**
 * Everything in here is available to the template
 *
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class PartialScope extends CorePartialScope
{
    use UrlGeneratorTrait;
}
