<?php
namespace Pyz\Yves\Application\Module;

use ProjectA\Yves\Library\Silex\Controller\ControllerProvider as YvesProvider;

class ControllerProvider extends YvesProvider
{

    const ROUTE_HOME = 'index';

    protected function defineControllers()
    {
        $this->createGetController('/', 'IndexController', 'index', self::ROUTE_HOME);
    }
}
