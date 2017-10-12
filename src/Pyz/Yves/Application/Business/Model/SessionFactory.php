<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Application\Business\Model;

use Spryker\Shared\Config\Config;
use Spryker\Shared\Session\Business\Model\SessionFactory as SharedSessionFactory;
use Spryker\Shared\Session\SessionConstants;

class SessionFactory extends SharedSessionFactory
{
    /**
     * @return int
     */
    protected function getSessionLifetime()
    {
        $lifetime = (int)Config::get(SessionConstants::YVES_SESSION_TIME_TO_LIVE);

        return $lifetime;
    }
}
