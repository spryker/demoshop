<?php

namespace Pyz\Yves\Heartbeat\Communication\Plugin;

use Generated\Shared\Heartbeat\HealthReportInterface;
use Generated\Shared\Transfer\HealthReportTransfer;
use SprykerEngine\Yves\Kernel\Communication\AbstractPlugin;
use SprykerFeature\Shared\Heartbeat\Code\HealthIndicatorInterface;

class Doctor extends AbstractPlugin
{

    /**
     * @var HealthReportInterface
     */
    protected $healthReport;

    /**
     * @var HealthIndicatorInterface[]
     */
    protected $healthIndicator;

    /**
     * @param array $healthIndicator
     */
    public function setHealthIndicator(array $healthIndicator)
    {
        $this->healthIndicator = $healthIndicator;
    }

    /**
     * @return self
     */
    public function doHealthCheck()
    {
        $this->healthReport = new HealthReportTransfer();

        foreach ($this->healthIndicator as $healthIndicator) {
            $this->check($healthIndicator);
        }

        return $this;
    }

    /**
     * @param HealthIndicatorInterface $healthIndicator
     */
    private function check(HealthIndicatorInterface $healthIndicator)
    {
        $healthIndicator->doHealthCheck();
        $healthIndicator->writeHealthReport($this->healthReport);
    }

    /**
     * @return HealthReportInterface
     */
    public function getReport()
    {
        return $this->healthReport;
    }

    /**
     * @return bool
     */
    public function isPatientAlive()
    {
        $patientIsAlive = true;

        foreach ($this->healthReport->getHealthIndicatorReport() as $healthIndicatorReport) {
            if (!$healthIndicatorReport->getStatus()) {
                $patientIsAlive = false;
            }
        }

        return $patientIsAlive;
    }

}
