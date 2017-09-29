<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Command\CommandLine;

use Spryker\Command\CommandInterface;
use Spryker\Configuration\Command\CommandInterface as ConfigurationCommandInterface;
use Symfony\Component\Console\Style\StyleInterface;
use Symfony\Component\Process\Process;

class CommandLineCommand implements CommandInterface
{

    /**
     * @var \Spryker\Configuration\Command\CommandInterface
     */
    protected $command;

    /**
     * @param \Spryker\Configuration\Command\CommandInterface $command
     */
    public function __construct(ConfigurationCommandInterface $command)
    {
        $this->command = $command;
    }

    /**
     * @param \Symfony\Component\Console\Style\StyleInterface $style
     *
     * @return int
     */
    public function execute(StyleInterface $style)
    {
        $style->section(sprintf('Execute command line command: <info>%s</info>', $this->command->getName()));
        $style->note(sprintf('CLI call: %s', $this->command->getExecutable()));

        $process = new Process($this->command->getExecutable(), SPRYKER_ROOT);
        $process->run(function ($type, $buffer) use ($style) {
            if (Process::ERR === $type) {
                $style->error($buffer);
            } else {
                $style->text($buffer);
            }
        });

        $style->success('CLI call executed.');
    }

}
