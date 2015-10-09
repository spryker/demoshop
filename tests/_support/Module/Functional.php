<?php

namespace Module;

use Codeception\TestCase;
use Codeception\Module;
use Propel\Runtime\Propel;
use Silex\Application;
use SprykerEngine\Zed\Propel\Communication\Plugin\ServiceProvider\PropelServiceProvider;

/**
 * All public methods declared in helper class will be available in $I
 */
class Functional extends Module
{

    /**
     * @param array $config
     */
    public function __construct($config = null)
    {
        parent::__construct($config);

        $propelServiceProvider = new PropelServiceProvider();
        $propelServiceProvider->boot(new Application());
    }

    /**
     * @param TestCase $test
     */
    public function _before(TestCase $test)
    {
        parent::_before($test);

        Propel::getWriteConnection('zed')->beginTransaction();
    }

    /**
     * @param TestCase $test
     */
    public function _after(TestCase $test)
    {
        parent::_after($test);

        Propel::getWriteConnection('zed')->rollBack();

        if (session_status() === PHP_SESSION_ACTIVE) {
            session_destroy();
        }
    }

    /**
     * @param TestCase $test
     * @apram $fail
     */
    public function _failed(TestCase $test, $fail)
    {
        parent::_failed($test, $fail);

        Propel::getWriteConnection('zed')->rollBack();

        if (session_status() === PHP_SESSION_ACTIVE) {
            session_destroy();
        }
    }

}
