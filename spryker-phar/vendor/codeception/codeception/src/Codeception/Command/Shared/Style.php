<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Codeception\Command\Shared;

use Symfony\Component\Console\Formatter\OutputFormatterStyle;
use Symfony\Component\Console\Output\OutputInterface;

trait Style
{

    /**
     * @return void
     */
    public function addStyles(OutputInterface $output)
    {
        $output->getFormatter()->setStyle('notice', new OutputFormatterStyle('white', 'green', ['bold']));
        $output->getFormatter()->setStyle('bold', new OutputFormatterStyle(null, null, ['bold']));
        $output->getFormatter()->setStyle('warning', new OutputFormatterStyle(null, 'yellow', ['bold']));
        $output->getFormatter()->setStyle('debug', new OutputFormatterStyle('cyan'));
    }

}
