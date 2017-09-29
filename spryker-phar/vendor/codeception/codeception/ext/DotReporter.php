<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Codeception\Extension;

use Codeception\Event\FailEvent;
use Codeception\Events;
use Codeception\Extension;
use Codeception\Subscriber\Console;

/**
 * DotReporter provides less verbose output for test execution.
 * Like PHPUnit printer it prints dots "." for successful testes and "F" for failures.
 *
 * ![](https://cloud.githubusercontent.com/assets/220264/26132800/4d23f336-3aab-11e7-81ba-2896a4c623d2.png)
 *
 * ```bash
 *  ..........
 *  ..........
 *  ..........
 *  ..........
 *  ..........
 *  ..........
 *  ..........
 *  ..........
 *
 * Time: 2.07 seconds, Memory: 20.00MB
 *
 * OK (80 tests, 124 assertions)
 * ```
 *
 *
 * Enable this reporter with `--ext option`
 *
 * ```
 * codecept run --ext DotReporter
 * ```
 *
 * Failures and Errors are printed by a standard Codeception reporter.
 * Use this extension as an example for building custom reporters.
 */
class DotReporter extends Extension
{

    /**
     * @var \Codeception\Subscriber\Console
     */
    protected $standardReporter;

    protected $errors = [];

    protected $failures = [];

    protected $width = 10;

    protected $currentPos = 0;

    /**
     * @return void
     */
    public function _initialize()
    {
        $this->options['silent'] = false; // turn on printing for this extension
        $this->_reconfigure(['settings' => ['silent' => true]]); // turn off printing for everything else
        $this->standardReporter = new Console($this->options);
        $this->width = $this->standardReporter->detectWidth();
    }

    // we are listening for events
    public static $events = [
        Events::SUITE_BEFORE => 'beforeSuite',
        Events::TEST_SUCCESS => 'success',
        Events::TEST_FAIL => 'fail',
        Events::TEST_ERROR => 'error',
        Events::TEST_SKIPPED => 'skipped',
        Events::TEST_FAIL_PRINT => 'printFailed',
    ];

    /**
     * @return void
     */
    public function beforeSuite()
    {
        $this->writeln("");
    }

    /**
     * @return void
     */
    public function success()
    {
        $this->printChar('.');
    }

    /**
     * @return void
     */
    public function fail(FailEvent $e)
    {
        $this->printChar("<error>F</error>");
    }

    /**
     * @return void
     */
    public function error(FailEvent $e)
    {
        $this->printChar('<error>E</error>');
    }

    /**
     * @return void
     */
    public function skipped()
    {
        $this->printChar('S');
    }

    /**
     * @return void
     */
    protected function printChar($char)
    {
        if ($this->currentPos >= $this->width) {
            $this->writeln('');
            $this->currentPos = 0;
        }
        $this->write($char);
        $this->currentPos++;
    }

    /**
     * @return void
     */
    public function printFailed(FailEvent $event)
    {
        $this->standardReporter->printFail($event);
    }

}
