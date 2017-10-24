<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Log;

use Spryker\Yves\Log\LogConfig as SprykerLogConfig;
use SprykerEco\Shared\Loggly\LogglyConstants;
use SprykerEco\Zed\Loggly\LogglyConfig;

class LogConfig extends SprykerLogConfig
{
    /**
     * @return string
     */
    public function getQueueName()
    {
        return $this->get(LogglyConstants::QUEUE_NAME, LogglyConfig::DEFAULT_QUEUE_NAME);
    }
}
