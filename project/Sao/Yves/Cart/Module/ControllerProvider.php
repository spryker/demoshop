<?php
namespace Sao\Yves\Cart\Module;

use ProjectA\Yves\Library\Silex\Provider\Controller\BundleControllerActionProvider;

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class ControllerProvider extends BundleControllerActionProvider
{
    /**
     * Return the route to match
     * possible:
     * "module"  => "module/index/index"
     * "module/controller" => "module/controller/index"
     * "module/controller/action"
     *
     * @return array
     */
    public function getRoutes()
    {
        return 'cart';
    }
}
