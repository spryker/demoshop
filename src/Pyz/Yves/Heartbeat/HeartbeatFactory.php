<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Heartbeat;

use Pyz\Yves\Heartbeat\Model\HealthChecker;
use Pyz\Yves\Heartbeat\Model\HealthIndicator\SearchHealthIndicator;
use Pyz\Yves\Heartbeat\Model\HealthIndicator\SessionHealthIndicator;
use Pyz\Yves\Heartbeat\Model\HealthIndicator\StorageHealthIndicator;
use Spryker\Yves\Kernel\AbstractFactory;

class HeartbeatFactory extends AbstractFactory
{
    /**
     * @return \Pyz\Yves\Heartbeat\Model\HealthChecker
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
     * @return \Pyz\Yves\Heartbeat\Model\HealthIndicator\SearchHealthIndicator
     */
    protected function createSearchHealthIndicator()
    {
        return new SearchHealthIndicator($this->getSearchClient());
    }

    /**
     * @return \Spryker\Client\Search\SearchClientInterface
     */
    protected function getSearchClient()
    {
        return $this->getProvidedDependency(HeartbeatDependencyProvider::CLIENT_SEARCH);
    }

    /**
     * @return \Pyz\Yves\Heartbeat\Model\HealthIndicator\SessionHealthIndicator
     */
    protected function createSessionHealthIndicator()
    {
        return new SessionHealthIndicator($this->getSessionClient());
    }

    /**
     * @return \Spryker\Client\Session\SessionClientInterface
     */
    protected function getSessionClient()
    {
        return $this->getProvidedDependency(HeartbeatDependencyProvider::CLIENT_SESSION);
    }

    /**
     * @return \Pyz\Yves\Heartbeat\Model\HealthIndicator\StorageHealthIndicator
     */
    protected function createStorageHealthIndicator()
    {
        return new StorageHealthIndicator($this->getStorageClient());
    }

    /**
     * @return \Spryker\Client\Storage\StorageClientInterface
     */
    protected function getStorageClient()
    {
        return $this->getProvidedDependency(HeartbeatDependencyProvider::CLIENT_STORAGE);
    }
}
