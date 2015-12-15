<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Heartbeat;

use Pyz\Yves\Heartbeat\Model\HealthChecker;
use Pyz\Yves\Heartbeat\Model\HealthIndicator\SearchHealthIndicator;
use Pyz\Yves\Heartbeat\Model\HealthIndicator\SessionHealthIndicator;
use Pyz\Yves\Heartbeat\Model\HealthIndicator\StorageHealthIndicator;
use Spryker\Yves\Kernel\AbstractDependencyContainer;

class HeartbeatDependencyContainer extends AbstractDependencyContainer
{

    /**
     * @return HealthChecker
     */
    public function createHealthChecker()
    {
        $healthChecker = new HealthChecker();
        $healthChecker->setHealthIndicator([
            $this->createSearchHealthIndicator(),
            $this->createSessionHealthIndicator(),
            $this->createStorageHealthIndicator(),
        ]);

        return $healthChecker;
    }

    /**
     * @return SearchHealthIndicator
     */
    protected function createSearchHealthIndicator()
    {
        return new SearchHealthIndicator($this->getLocator()->search()->client());
    }

    /**
     * @return SessionHealthIndicator
     */
    protected function createSessionHealthIndicator()
    {
        return new SessionHealthIndicator($this->getLocator()->session()->client());
    }

    /**
     * @return StorageHealthIndicator
     */
    protected function createStorageHealthIndicator()
    {
        return new StorageHealthIndicator($this->getLocator()->storage()->client());
    }

}
