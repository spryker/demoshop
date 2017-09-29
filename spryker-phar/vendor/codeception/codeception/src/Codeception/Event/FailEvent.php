<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Codeception\Event;

use Exception;
use PHPUnit_Framework_Test;

class FailEvent extends TestEvent
{

    /**
     * @var \Exception
     */
    protected $fail;

    /**
     * @var int
     */
    protected $count;

    public function __construct(PHPUnit_Framework_Test $test, $time, Exception $e, $count = 0)
    {
        parent::__construct($test, $time);
        $this->fail = $e;
        $this->count = $count;
    }

    public function getCount()
    {
        return $this->count;
    }

    public function getFail()
    {
        return $this->fail;
    }

}
