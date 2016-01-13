<?php

namespace Pyz\Yves\Application\Plugin;

use Spryker\Shared\Application\Communication\Application;
use Spryker\Yves\Kernel\AbstractPlugin;

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
