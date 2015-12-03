<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Heartbeat\Communication;

use Pyz\Yves\Heartbeat\Communication\Model\HealthChecker;
use Pyz\Yves\Heartbeat\Communication\Model\HealthIndicator\SearchHealthIndicator;
use Pyz\Yves\Heartbeat\Communication\Model\HealthIndicator\SessionHealthIndicator;
use Pyz\Yves\Heartbeat\Communication\Model\HealthIndicator\StorageHealthIndicator;
use SprykerEngine\Yves\Kernel\Communication\AbstractCommunicationDependencyContainer;

class HeartbeatDependencyContainer extends AbstractCommunicationDependencyContainer
{

    /**
     * @return \Pyz\Yves\Heartbeat\Communication\Model\HealthChecker
     */
    public function createHealthChecker()
    {
        $healthChecker = new HealthChecker();
        $healthChecker->setHealthIndicator([
            new SearchHealthIndicator($this->getLocator()->search()->client()),
            new SessionHealthIndicator($this->getLocator()->session()->client()),
            new StorageHealthIndicator($this->getLocator()->storage()->client()),
        ]);

        return $healthChecker;
    }

}
