<?php

namespace Module;

use Codeception\Module;
use Codeception\TestCase;
use Propel\Runtime\Propel;
use Silex\Application;
use Spryker\Zed\Propel\Communication\Plugin\ServiceProvider\PropelServiceProvider;

/**
 * All public methods declared in helper class will be available in $I
 */
class Functional extends Module
{

    /**
     * @param \Codeception\TestCase $test
     *
     * @return void
     */
    public function _before(TestCase $test)
    {
        parent::_before($test);

        $propelServiceProvider = new PropelServiceProvider();
        $propelServiceProvider->boot(new Application());

        Propel::getWriteConnection('zed')->beginTransaction();
    }

    /**
     * @param \Codeception\TestCase $test
     *
     * @return void
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
     * @param \Codeception\TestCase $test
     * @param bool $fail
     *
     * @return void
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
