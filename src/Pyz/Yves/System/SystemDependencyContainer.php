<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\System;

use Pyz\Yves\Heartbeat\Plugin\HeartbeatMonitor;
use SprykerEngine\Yves\Kernel\AbstractDependencyContainer;

class SystemDependencyContainer extends AbstractDependencyContainer
{

    /**
     * @return HeartbeatMonitor
     */
    public function createHeartbeatMonitor()
    {
        return new HeartbeatMonitor();
    }

}
