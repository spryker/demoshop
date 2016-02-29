<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Auth;

use Spryker\Zed\Auth\AuthConfig as SprykerAuthConfig;

class AuthConfig extends SprykerAuthConfig
{

    /**
     * @return array
     */
    public function getIgnorable()
    {
        $this->addIgnorable('system', 'heartbeat', 'index');

        return parent::getIgnorable();
    }

}
