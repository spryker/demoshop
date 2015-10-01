<?php

namespace Pyz\Yves\Heartbeat\Communication\Plugin;

use Generated\Shared\Transfer\HealthDetailTransfer;
use Generated\Shared\Transfer\HealthIndicatorReportTransfer;
use Generated\Shared\Transfer\HealthReportTransfer;
use Pyz\Yves\Heartbeat\Communication\HeartbeatDependencyContainer;
use SprykerEngine\Yves\Kernel\Communication\AbstractPlugin;
use SprykerFeature\Shared\Heartbeat\Code\HealthIndicatorInterface;

/**
 * @method HeartbeatDependencyContainer getDependencyContainer()
 */
class SessionHealthIndicator extends AbstractPlugin implements HealthIndicatorInterface
{

    const HEALTH_MESSAGE_UNABLE_TO_WRITE_SESSION = 'Unable to write session';
    const HEALTH_MESSAGE_UNABLE_TO_READ_SESSION = 'Unable to read session';
    const KEY_HEARTBEAT = 'heartbeat';

    /**
     * @param HealthReportTransfer $healthReportTransfer
     */
    public function doHealthCheck(HealthReportTransfer $healthReportTransfer)
    {
        $healthIndicatorReport = new HealthIndicatorReportTransfer();
        $healthIndicatorReport->setName(get_class($this));
        $healthIndicatorReport->setStatus(true);

        if (!$this->canWriteSession()) {
            $healthIndicatorReport->setStatus(false);
            $healthDetail = new HealthDetailTransfer();
            $healthDetail->setMessage(self::HEALTH_MESSAGE_UNABLE_TO_WRITE_SESSION);
            $healthIndicatorReport->addHealthDetail($healthDetail);
        }
        if (!$this->canReadSession()) {
            $healthIndicatorReport->setStatus(false);
            $healthDetail = new HealthDetailTransfer();
            $healthDetail->setMessage(self::HEALTH_MESSAGE_UNABLE_TO_READ_SESSION);
            $healthIndicatorReport->addHealthDetail($healthDetail);
        }

        $healthReportTransfer->addHealthIndicatorReport($healthIndicatorReport);
    }

    /**
     * @return bool
     */
    private function canWriteSession()
    {
        try {
            $this->getDependencyContainer()->createSessionClient()->set(self::KEY_HEARTBEAT, 'ok');
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }

    /**
     * @return bool
     */
    private function canReadSession()
    {
        try {
            $this->getDependencyContainer()->createSessionClient()->get(self::KEY_HEARTBEAT);
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }

}
