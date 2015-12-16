<?php

/**
 * (c) Copyright Spryker Systems GmbH 2015
 */

namespace Pyz\Yves\EventJournal\Collector;

use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Config;
use Spryker\Shared\EventJournal\Model\Collector\AbstractDataCollector;
use Spryker\Shared\EventJournal\Model\Collector\DataCollectorInterface;

class YvesDataCollector extends AbstractDataCollector implements DataCollectorInterface
{

    const TYPE = 'yves';

    /**
     * @return array
     */
    public function getData()
    {
        return [
            'session_id' => session_id(),
            'device_id' => $this->getDeviceId(),
            'visitor_id' => $this->getVisitorId()
        ];
    }

    /**
     * @return string|null
     */
    protected function getDeviceId()
    {
        $key = Config::get(ApplicationConstants::YVES_COOKIE_DEVICE_ID_NAME);
        return $_COOKIE[$key] ?: null;
    }

    /**
     * @return string|null
     */
    protected function getVisitorId()
    {
        $key = Config::get(ApplicationConstants::YVES_COOKIE_VISITOR_ID_NAME);
        return $_COOKIE[$key] ?: null;
    }

}
