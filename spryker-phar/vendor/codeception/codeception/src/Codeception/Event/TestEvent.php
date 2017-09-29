<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Codeception\Event;

use PHPUnit_Framework_Test;
use Symfony\Component\EventDispatcher\Event;

class TestEvent extends Event
{

    /**
     * @var \PHPUnit_Framework_Test
     */
    protected $test;

    /**
     * @var float Time taken
     */
    protected $time;

    public function __construct(PHPUnit_Framework_Test $test, $time = 0)
    {
        $this->test = $test;
        $this->time = $time;
    }

    /**
     * @return float
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @return \Codeception\TestInterface
     */
    public function getTest()
    {
        return $this->test;
    }

}
