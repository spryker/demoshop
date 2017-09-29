<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Codeception\Event;

use Codeception\Step;
use Codeception\TestInterface;
use Symfony\Component\EventDispatcher\Event;

class StepEvent extends Event
{

    /**
     * @var \Codeception\Step
     */
    protected $step;

    /**
     * @var \Codeception\TestInterface
     */
    protected $test;

    public function __construct(TestInterface $test, Step $step)
    {
        $this->test = $test;
        $this->step = $step;
    }

    public function getStep()
    {
        return $this->step;
    }

    /**
     * @return \Codeception\TestInterface
     */
    public function getTest()
    {
        return $this->test;
    }

}
