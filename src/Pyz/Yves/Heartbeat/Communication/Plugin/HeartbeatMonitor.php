<?php

namespace Pyz\Yves\Heartbeat\Communication\Plugin;

use Generated\Shared\Transfer\HealthReportTransfer;
use Pyz\Yves\Heartbeat\Communication\HeartbeatDependencyContainer;
use SprykerEngine\Yves\Kernel\Communication\AbstractPlugin;

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
