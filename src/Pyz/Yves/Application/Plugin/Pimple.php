<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Application\Plugin;

use Spryker\Shared\Application\Communication\Application;
use Spryker\Yves\Kernel\AbstractPlugin;

class Pimple extends AbstractPlugin
{

    /**
     * @var \Spryker\Shared\Application\Communication\Application
     */
    protected static $application;

    /**
     * @param \Spryker\Shared\Application\Communication\Application $application
     *
     * @return void
     */
    public static function setApplication(Application $application)
    {
        self::$application = $application;
    }

    /**
     * @return \Spryker\Shared\Application\Communication\Application
     */
    public function getApplication()
    {
        return self::$application;
    }

}
