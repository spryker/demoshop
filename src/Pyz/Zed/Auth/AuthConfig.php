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
        $this->addIgnorable('heartbeat', 'index', 'index');
        $this->addIgnorable('application', 'api', 'index');
        $this->addIgnorable('_profiler', 'wdt', '*');

        return parent::getIgnorable();
    }
}
