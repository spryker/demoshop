<?php

namespace Pyz\Yves\System\Communication\Plugin;

use SprykerEngine\Yves\Application\Communication\Plugin\YvesControllerProvider;
use Silex\Application;

class SystemControllerProvider extends YvesControllerProvider
{

    const ROUTE_HEARTBEAT = 'system/heartbeat';

    /**
     * @param Application $app
     */
    protected function defineControllers(Application $app)
    {
        $this->createController('/system/heartbeat', self::ROUTE_HEARTBEAT, 'System', 'Heartbeat', 'index');
    }

}
