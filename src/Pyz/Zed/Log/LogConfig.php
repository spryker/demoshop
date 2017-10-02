<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Log;

use Spryker\Shared\Loggly\LogglyConstants;
use Spryker\Zed\Log\LogConfig as SprykerLogConfig;

class LogConfig extends SprykerLogConfig
{

    /**
     * @return string
     */
    public function getQueueName()
    {
        return $this->get(LogglyConstants::QUEUE_NAME);
    }

}
