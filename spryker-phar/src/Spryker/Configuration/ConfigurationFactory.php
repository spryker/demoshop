<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Configuration;

use Spryker\Configuration\Command\Command;
use Spryker\Configuration\Section\Section;
use Spryker\Configuration\Stage\Stage;

class ConfigurationFactory
{

    /**
     * @param $name
     * @param \Spryker\Configuration\Section\Section[] $sections
     *
     * @return \Spryker\Configuration\Stage\Stage
     */
    public function createStage($name, array $sections)
    {
        $stage = new Stage($name);
        foreach ($sections as $section) {
            $stage->addSection($section);
        }

        return $stage;
    }

    /**
     * @param string $name
     * @param \Spryker\Configuration\Command\CommandConfigurationInterface[] $commands
     *
     * @return \Spryker\Configuration\Section\Section
     */
    public function createSection($name, array $commands)
    {
        $section = new Section($name);
        foreach ($commands as $command) {
            $section->addCommand($command);
        }

        return $section;
    }

    /**
     * @param string $name
     * @param \Spryker\Command\CommandInterface|callable|string $executable
     * @param array $groups
     *
     * @return \Spryker\Configuration\Command\Command
     */
    public function createCommand($name, $executable, $groups = [])
    {
        $command = new Command($name);
        $command->setExecutable($executable);
        $command->setGroups($groups);

        return $command;
    }

}
