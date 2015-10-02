<?php

namespace Pyz\Yves\Heartbeat\Communication\Plugin;

use Pyz\Yves\Heartbeat\Communication\HeartbeatDependencyContainer;
use SprykerFeature\Shared\Heartbeat\Code\HealthIndicatorInterface;

/**
 * @method HeartbeatDependencyContainer getDependencyContainer()
 */
class SessionHealthIndicator extends AbstractHealthIndicatorPlugin implements HealthIndicatorInterface
{

    const HEALTH_MESSAGE_UNABLE_TO_WRITE_SESSION = 'Unable to write session';
    const HEALTH_MESSAGE_UNABLE_TO_READ_SESSION = 'Unable to read session';
    const KEY_HEARTBEAT = 'heartbeat';

    public function doHealthCheck()
    {
        $this->checkWriteSession();
        $this->checkReadSession();
    }

    private function checkWriteSession()
    {
        try {
            $this->getDependencyContainer()->createSessionClient()->set(self::KEY_HEARTBEAT, 'ok');
        } catch (\Exception $e) {
            $this->addDysfunction(self::HEALTH_MESSAGE_UNABLE_TO_WRITE_SESSION);
            $this->addDysfunction($e->getMessage());
        }
    }

    private function checkReadSession()
    {
        try {
            $this->getDependencyContainer()->createSessionClient()->get(self::KEY_HEARTBEAT);
        } catch (\Exception $e) {
            $this->addDysfunction(self::HEALTH_MESSAGE_UNABLE_TO_READ_SESSION);
            $this->addDysfunction($e->getMessage());
        }
    }

}
