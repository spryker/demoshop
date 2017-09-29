<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Command\Callback;

use Spryker\Command\CommandInterface;
use Spryker\Configuration\Command\CommandInterface as ConfigurationCommandInterface;
use Symfony\Component\Console\Style\StyleInterface;

class CallbackCommand implements CommandInterface
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
        $style->section(sprintf('Execute callback command: <info>%s</info>', $this->command->getName()));

        $result = call_user_func($this->command->getExecutable(), $style);
    }

}
