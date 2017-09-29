<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Configuration\Section;

use Spryker\Configuration\Command\CommandInterface;
use Spryker\Configuration\Exception\CommandExistsException;

class Section implements SectionConfigurationInterface, SectionInterface
{

    /**
     * @var string
     */
    protected $name;

    /**
     * @var \Spryker\Configuration\Command\CommandInterface[]
     */
    protected $commands = [];

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param \Spryker\Configuration\Command\CommandInterface $command
     *
     * @throws \Spryker\Configuration\Exception\CommandExistsException
     *
     * @return $this
     */
    public function addCommand(CommandInterface $command)
    {
        if (isset($this->commands[$command->getName()])) {
            throw new CommandExistsException(sprintf('Command with name "%s" already exists.', $command->getName()));
        }
        $this->commands[$command->getName()] = $command;

        return $this;
    }

    /**
     * @return \Spryker\Configuration\Command\CommandInterface[]
     */
    public function getCommands()
    {
        return $this->commands;
    }

}
