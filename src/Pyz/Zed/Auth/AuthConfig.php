<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Auth;

use SprykerFeature\Zed\Auth\AuthConfig as SprykerAuthConfig;

class AuthConfig extends SprykerAuthConfig
{

    /**
     * @return array
     */
    public function getIgnorable()
    {
        $this->setIgnorable('system', 'heartbeat', 'index');

        return parent::getIgnorable();
    }

}
