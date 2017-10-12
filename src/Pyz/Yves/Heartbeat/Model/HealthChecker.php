<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Heartbeat\Model;

use Generated\Shared\Transfer\HealthReportTransfer;
use Spryker\Shared\Heartbeat\Code\HealthIndicatorInterface;

class HealthChecker
{
    /**
     * @var \Generated\Shared\Transfer\HealthReportTransfer
     */
    protected $healthReport;

    /**
     * @var \Spryker\Shared\Heartbeat\Code\HealthIndicatorInterface[]
     */
    protected $healthIndicator;

    /**
     * @param array $healthIndicator
     *
     * @return void
     */
    public function setHealthIndicator(array $healthIndicator)
    {
        $this->healthIndicator = $healthIndicator;
    }

    /**
     * @return $this
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
     * @param \Spryker\Shared\Heartbeat\Code\HealthIndicatorInterface $healthIndicator
     *
     * @return void
     */
    private function check(HealthIndicatorInterface $healthIndicator)
    {
        $healthIndicator->doHealthCheck();
        $healthIndicator->writeHealthReport($this->healthReport);
    }

    /**
     * @return \Generated\Shared\Transfer\HealthReportTransfer
     */
    public function getReport()
    {
        return $this->healthReport;
    }

    /**
     * @return bool
     */
    public function isSystemAlive()
    {
        $systemIsAlive = true;

        foreach ($this->healthReport->getHealthIndicatorReport() as $healthIndicatorReport) {
            if (!$healthIndicatorReport->getStatus()) {
                $systemIsAlive = false;
            }
        }

        return $systemIsAlive;
    }
}
