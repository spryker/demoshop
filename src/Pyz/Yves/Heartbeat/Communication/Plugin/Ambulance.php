<?php

namespace Pyz\Yves\Heartbeat\Communication\Plugin;

use Pyz\Yves\Heartbeat\Communication\HeartbeatDependencyContainer;
use SprykerEngine\Yves\Kernel\Communication\AbstractPlugin;

/**
 * @method HeartbeatDependencyContainer getDependencyContainer()
 */
class Ambulance extends AbstractPlugin
{

    /**
     * @return bool
     */
    public function isSystemAlive()
    {
        return $this->getDependencyContainer()->createDoctor()->doHealthCheck()->isPatientAlive();
    }

    /**
     * @return HealthReportInterface
     */
    public function getReport()
    {
        return $this->getDependencyContainer()->createDoctor()->doHealthCheck()->getReport();
    }

}
