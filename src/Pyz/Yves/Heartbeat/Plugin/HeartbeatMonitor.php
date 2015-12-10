<?php

namespace Pyz\Yves\Heartbeat\Plugin;

use Generated\Shared\Transfer\HealthReportTransfer;
use Pyz\Yves\Heartbeat\HeartbeatDependencyContainer;
use SprykerEngine\Yves\Kernel\AbstractPlugin;

/**
 * @method HeartbeatDependencyContainer getDependencyContainer()
 */
class HeartbeatMonitor extends AbstractPlugin
{

    /**
     * @return bool
     */
    public function isSystemAlive()
    {
        return $this->getDependencyContainer()->createHealthChecker()->doHealthCheck()->isSystemAlive();
    }

    /**
     * @return HealthReportTransfer
     */
    public function getReport()
    {
        return $this->getDependencyContainer()->createHealthChecker()->doHealthCheck()->getReport();
    }

}
