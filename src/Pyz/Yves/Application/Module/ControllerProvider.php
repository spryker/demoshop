<?php
namespace Pyz\Yves\Application\Module;

use ProjectA\Yves\Library\Silex\Controller\ControllerProvider as YvesProvider;

class ControllerProvider extends YvesProvider
{

    protected function defineControllers()
    {
        $this->createGetController('/', 'Pyz\\Yves\\Application\\Module\\Controller\\IndexController', 'index', 'asda');

    }
}
