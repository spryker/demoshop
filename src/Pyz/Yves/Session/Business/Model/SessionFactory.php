<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Session\Business\Model;

use SprykerEngine\Shared\Config;
use SprykerFeature\Shared\Session\Business\Model\SessionFactory as SharedSessionFactory;
use SprykerFeature\Shared\System\SystemConfig;

class SessionFactory extends SharedSessionFactory
{

    /**
     * @return int
     */
    protected function getSessionLifetime()
    {
        $lifetime = (int) Config::get(SystemConfig::YVES_STORAGE_SESSION_TIME_TO_LIVE);

        return $lifetime;
    }

}
