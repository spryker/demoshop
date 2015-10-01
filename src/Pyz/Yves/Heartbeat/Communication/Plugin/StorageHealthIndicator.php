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
class StorageHealthIndicator extends AbstractPlugin implements HealthIndicatorInterface
{

    const HEALTH_MESSAGE_UNABLE_TO_READ_FROM_STORAGE = 'Unable to read from storage';
    const KEY_HEARTBEAT = 'heartbeat';

    /**
     * @param HealthReportTransfer $healthReportTransfer
     */
    public function doHealthCheck(HealthReportTransfer $healthReportTransfer)
    {
        $healthIndicatorReport = new HealthIndicatorReportTransfer();
        $healthIndicatorReport->setName(get_class($this));
        $healthIndicatorReport->setStatus(true);

        if (!$this->canReadFromStorage()) {
            $healthIndicatorReport->setStatus(false);
            $healthDetail = new HealthDetailTransfer();
            $healthDetail->setMessage(self::HEALTH_MESSAGE_UNABLE_TO_READ_FROM_STORAGE);
            $healthIndicatorReport->addHealthDetail($healthDetail);
        }

        $healthReportTransfer->addHealthIndicatorReport($healthIndicatorReport);
    }

    /**
     * @return bool
     */
    private function canReadFromStorage()
    {
        try {
            $this->getDependencyContainer()->createStorageClient()->get(self::KEY_HEARTBEAT);
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }

}
