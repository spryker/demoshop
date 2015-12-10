<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Heartbeat;

use Pyz\Yves\Heartbeat\Model\HealthChecker;
use Pyz\Yves\Heartbeat\Model\HealthIndicator\SearchHealthIndicator;
use Pyz\Yves\Heartbeat\Model\HealthIndicator\SessionHealthIndicator;
use Pyz\Yves\Heartbeat\Model\HealthIndicator\StorageHealthIndicator;
use SprykerEngine\Yves\Kernel\AbstractDependencyContainer;

class HeartbeatDependencyContainer extends AbstractDependencyContainer
{

    /**
     * @return HealthChecker
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
