<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Shared\Application\Log\Processor;

use Pyz\Shared\Log\LogConstants;
use Spryker\Shared\Config\Config;

class LogzIoTokenProcessor
{
    /**
     * @param array $record
     *
     * @return array
     */
    public function __invoke(array $record)
    {
        $record['token'] = Config::get(LogConstants::LOGZ_IO_TOKEN);

        return $record;
    }
}
