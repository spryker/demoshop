<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Session\Business\Model;

use SprykerEngine\Shared\Config;
use SprykerFeature\Shared\Session\Business\Model\SessionHelper as SharedSessionHelper;
use SprykerFeature\Shared\System\SystemConfig;

class SessionHelper extends SharedSessionHelper
{

    /**
     * @return int
     */
    protected function getSessionLifetime()
    {
        $lifetime = (int) ini_get('session.gc_maxlifetime');

        return $lifetime;
    }

}
