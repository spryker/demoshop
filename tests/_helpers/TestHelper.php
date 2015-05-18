<?php

namespace Pyz\Codeception\Module;

use Codeception\Module;
use Codeception\TestCase;
use SprykerFeature\Zed\Application\Communication\Plugin\ServiceProvider\PropelServiceProvider;
use Propel\Runtime\Propel;
use Silex\Application;

class TestHelper extends Module
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
     * @param TestCase $e
     */
    public function _before(TestCase $e)
    {
        parent::_before($e);
        Propel::getWriteConnection('zed')->beginTransaction();
    }

    /**
     * @param TestCase $e
     */
    public function _after(TestCase $e)
    {
        parent::_after($e);
        Propel::getWriteConnection('zed')->rollBack();
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_destroy();
        }
    }

    /**
     * @param TestCase $e
     * @apram $fail
     */
    public function _failed(TestCase $e, $fail)
    {
        parent::_failed($e, $fail);
        Propel::getWriteConnection('zed')->rollBack();
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_destroy();
        }
    }
}
