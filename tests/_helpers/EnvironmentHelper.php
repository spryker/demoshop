<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Codeception\Module;

use Codeception\Module;
use Codeception\TestCase;

class EnvironmentHelper extends Module
{

    /**
     * @param TestCase $test
     */
    public function _before(TestCase $test)
    {
        parent::_before($test);

        if (!($test instanceof EnvironmentalTestCaseInterface)) {
            return;
        }

        $test->setEnvironmentConfig($this->config);
    }

}
