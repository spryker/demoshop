<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Application\Communication\Plugin;

use SprykerFeature\Shared\Application\Business\Application;
use SprykerEngine\Yves\Kernel\Communication\AbstractPlugin;

class Pimple extends AbstractPlugin
{

    /**
     * @var Application
     */
    protected static $application;

    /**
     * @param Application $application
     */
    public static function setApplication(Application $application)
    {
        self::$application = $application;
    }

    /**
     * @return Application
     */
    public function getApplication()
    {
        return self::$application;
    }

}
