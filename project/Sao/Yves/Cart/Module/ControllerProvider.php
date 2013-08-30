<?php
namespace Sao\Yves\Cart\Module;

use ProjectA\Yves\Library\Silex\Controller\ControllerProvider as YvesProvider;
use Silex\Application;
use Silex\ControllerCollection;
use Silex\Route;

class ControllerProvider extends YvesProvider
{
    /**
     * @param ControllerCollection $controllerCollection
     */
    public function createRoutes(ControllerCollection $controllerCollection)
    {
        $controllerCollection->get('/cart', 'Sao\\Yves\\Cart\\Module\\Controller\\IndexController::indexAction');
    }
}
