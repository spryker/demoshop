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
class SearchHealthIndicator extends AbstractPlugin implements HealthIndicatorInterface
{

    const HEALTH_MESSAGE_UNABLE_TO_CONNECT_TO_SEARCH = 'Unable to connect to search';

    /**
     * @param HealthReportTransfer $healthReportTransfer
     */
    public function doHealthCheck(HealthReportTransfer $healthReportTransfer)
    {
        $healthIndicatorReport = new HealthIndicatorReportTransfer();
        $healthIndicatorReport->setName(get_class($this));
        $healthIndicatorReport->setStatus(true);

        if (!$this->canConnectToSearch()) {
            $healthIndicatorReport->setStatus(false);
            $healthDetail = new HealthDetailTransfer();
            $healthDetail->setMessage(self::HEALTH_MESSAGE_UNABLE_TO_CONNECT_TO_SEARCH);
            $healthIndicatorReport->addHealthDetail($healthDetail);
        }

        $healthReportTransfer->addHealthIndicatorReport($healthIndicatorReport);
    }

    /**
     * @return bool
     */
    private function canConnectToSearch()
    {
        try {
            $this->getDependencyContainer()->createSearchClient()->getIndexClient()->getStats();
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }

}
