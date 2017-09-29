<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Codeception;

use Codeception\Lib\Actor\Shared\Comment;
use Codeception\Lib\Actor\Shared\Friend;
use Codeception\Step\Executor;
use RuntimeException;

abstract class Actor
{

    use Comment;
    use Friend;

    /**
     * @var \Codeception\Scenario
     */
    protected $scenario;

    public function __construct(Scenario $scenario)
    {
        $this->scenario = $scenario;
    }

    /**
     * @return \Codeception\Scenario
     */
    protected function getScenario()
    {
        return $this->scenario;
    }

    /**
     * @return void
     */
    public function wantToTest($text)
    {
        $this->wantTo('test ' . $text);
    }

    /**
     * @return void
     */
    public function wantTo($text)
    {
        $this->scenario->setFeature(mb_strtolower($text, 'utf-8'));
    }

    /**
     * @throws \RuntimeException
     *
     * @return void
     */
    public function __call($method, $arguments)
    {
        $class = get_class($this);
        throw new RuntimeException("Call to undefined method $class::$method");
    }

    /**
     * Lazy-execution given anonymous function
     *
     * @param $callable \Closure
     *
     * @return $this
     */
    public function execute($callable)
    {
        $this->scenario->addStep(new Executor($callable, []));
        $callable();
        return $this;
    }

}
