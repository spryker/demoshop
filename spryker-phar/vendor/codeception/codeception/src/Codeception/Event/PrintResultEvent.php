<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Codeception\Event;

use PHPUnit_Framework_TestResult;
use PHPUnit_Util_Printer;
use Symfony\Component\EventDispatcher\Event;

class PrintResultEvent extends Event
{

    /**
     * @var \PHPUnit_Framework_TestResult
     */
    protected $result;

    /**
     * @var \PHPUnit_Util_Printer
     */
    protected $printer;

    public function __construct(PHPUnit_Framework_TestResult $result, PHPUnit_Util_Printer $printer)
    {
        $this->result = $result;
        $this->printer = $printer;
    }

    /**
     * @return \PHPUnit_Util_Printer
     */
    public function getPrinter()
    {
        return $this->printer;
    }

    /**
     * @return \PHPUnit_Framework_TestResult
     */
    public function getResult()
    {
        return $this->result;
    }

}
