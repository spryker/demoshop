<?php

namespace Pyz\Yves\Heartbeat\Communication\Plugin;

use Pyz\Yves\Heartbeat\Communication\HeartbeatDependencyContainer;
use SprykerFeature\Shared\Heartbeat\Code\HealthIndicatorInterface;

/**
 * @method HeartbeatDependencyContainer getDependencyContainer()
 */
class StorageHealthIndicator extends AbstractHealthIndicatorPlugin implements HealthIndicatorInterface
{

    const HEALTH_MESSAGE_UNABLE_TO_READ_FROM_STORAGE = 'Unable to read from storage';
    const KEY_HEARTBEAT = 'heartbeat';

    public function doHealthCheck()
    {
        $this->checkReadFromStorage();
    }

    private function checkReadFromStorage()
    {
        try {
            $this->getDependencyContainer()->createStorageClient()->get(self::KEY_HEARTBEAT);
        } catch (\Exception $e) {
            $this->addDysfunction(self::HEALTH_MESSAGE_UNABLE_TO_READ_FROM_STORAGE);
            $this->addDysfunction($e->getMessage());
        }
    }

}
