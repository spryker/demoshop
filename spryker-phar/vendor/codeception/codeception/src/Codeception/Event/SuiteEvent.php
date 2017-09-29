<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Codeception\Event;

use PHPUnit_Framework_TestResult;
use PHPUnit_Framework_TestSuite;
use Symfony\Component\EventDispatcher\Event;

class SuiteEvent extends Event
{

    /**
     * @var \PHPUnit_Framework_TestSuite
     */
    protected $suite;

    /**
     * @var \PHPUnit_Framework_TestResult
     */
    protected $result;

    /**
     * @var array
     */
    protected $settings;

    public function __construct(
        PHPUnit_Framework_TestSuite $suite,
        PHPUnit_Framework_TestResult $result = null,
        $settings = []
    ) {
        $this->suite = $suite;
        $this->result = $result;
        $this->settings = $settings;
    }

    /**
     * @return \Codeception\Suite
     */
    public function getSuite()
    {
        return $this->suite;
    }

    /**
     * @return \PHPUnit_Framework_TestResult
     */
    public function getResult()
    {
        return $this->result;
    }

    public function getSettings()
    {
        return $this->settings;
    }

}
