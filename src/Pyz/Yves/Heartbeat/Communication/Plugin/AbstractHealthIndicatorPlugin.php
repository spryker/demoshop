<?php

namespace Pyz\Yves\Heartbeat\Communication\Plugin;

use Generated\Shared\Heartbeat\HealthReportInterface;
use Generated\Shared\Transfer\HealthDetailTransfer;
use Generated\Shared\Transfer\HealthIndicatorReportTransfer;
use SprykerEngine\Yves\Kernel\Communication\AbstractPlugin;
use SprykerFeature\Shared\Heartbeat\Code\HealthIndicatorInterface;

abstract class AbstractHealthIndicatorPlugin extends AbstractPlugin implements HealthIndicatorInterface
{

    /**
     * @var HealthReportInterface
     */
    private $healthIndicatorReport;

    /**
     * @param HealthReportInterface $healthReport
     */
    public function writeHealthReport(HealthReportInterface $healthReport)
    {
        $healthReport->addHealthIndicatorReport($this->getHealthIndicatorReport());
    }

    /**
     * @param string $message
     */
    protected function addDysfunction($message)
    {
        $healthIndicatorReport = $this->getHealthIndicatorReport();
        $healthIndicatorReport->setStatus(false);

        $healthDetail = new HealthDetailTransfer();
        $healthDetail->setMessage($message);

        $healthIndicatorReport->addHealthDetail($healthDetail);
    }

    /**
     * @return HealthIndicatorReportTransfer
     */
    private function getHealthIndicatorReport()
    {
        if (!$this->healthIndicatorReport) {
            $this->healthIndicatorReport = new HealthIndicatorReportTransfer();
            $this->healthIndicatorReport->setName(get_class($this));
            $this->healthIndicatorReport->setStatus(true);
        }

        return $this->healthIndicatorReport;
    }

}
