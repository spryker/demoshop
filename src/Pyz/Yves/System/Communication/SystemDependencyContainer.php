<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\System\Communication;

use Pyz\Yves\Heartbeat\Communication\Plugin\HeartbeatMonitor;
use SprykerEngine\Yves\Kernel\Communication\AbstractCommunicationDependencyContainer;

class SystemDependencyContainer extends AbstractCommunicationDependencyContainer
{

    /**
     * @return HeartbeatMonitor
     */
    public function createHeartbeatMonitor()
    {
        return $this->getLocator()->heartbeat()->pluginHeartbeatMonitor();
    }

}
