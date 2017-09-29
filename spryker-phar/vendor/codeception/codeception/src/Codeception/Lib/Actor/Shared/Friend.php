<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Codeception\Lib\Actor\Shared;

use Codeception\Lib\Friend as LibFriend;

trait Friend
{

    protected $friends = [];

    /**
     * @return \Codeception\Scenario
     */
    abstract protected function getScenario();

    /**
     * @param $name
     * @param $actorClass|null
     *
     * @return \Codeception\Lib\Friend
     */
    public function haveFriend($name, $actorClass = null)
    {
        if (!isset($this->friends[$name])) {
            $actor = $actorClass === null ? $this : new $actorClass($this->getScenario());
            $this->friends[$name] = new LibFriend($name, $actor, $this->getScenario()->current('modules'));
        }
        return $this->friends[$name];
    }

}
