<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Codeception\Lib\Console;

use SebastianBergmann\Comparator\ComparisonFailure;

/**
 * MessageFactory
 **/
class MessageFactory
{

    /**
     * @var \Codeception\Lib\Console\DiffFactory
     */
    protected $diffFactory;

    /**
     * @var \Codeception\Lib\Console\Output
     */
    private $output;

    /**
     * @var \Codeception\Lib\Console\Colorizer
     */
    protected $colorizer;

    /**
     * MessageFactory constructor.
     *
     * @param \Codeception\Lib\Console\Output $output
     */
    public function __construct(Output $output)
    {
        $this->output = $output;
        $this->diffFactory = new DiffFactory();
        $this->colorizer = new Colorizer();
    }

    /**
     * @param string $text
     *
     * @return \Codeception\Lib\Console\Message
     */
    public function message($text = '')
    {
        return new Message($text, $this->output);
    }

    /**
     * @param \SebastianBergmann\Comparator\ComparisonFailure $failure
     *
     * @return string
     */
    public function prepareComparisonFailureMessage(ComparisonFailure $failure)
    {
        $diff = $this->diffFactory->createDiff($failure);
        if (!$diff) {
            return '';
        }
        $diff = $this->colorizer->colorize($diff);

        return "\n<comment>- Expected</comment> | <info>+ Actual</info>\n$diff";
    }

}
