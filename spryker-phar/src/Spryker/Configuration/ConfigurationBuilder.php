<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Configuration;

use Spryker\Configuration\Command\Command;
use Spryker\Configuration\Section\Section;
use Spryker\Configuration\Stage\Stage;
use Exception;

class ConfigurationBuilder
{

    /**
     * @var ConfigurationLoaderInterface
     */
    protected $configurationLoader;

    /**
     * @param \Spryker\Configuration\ConfigurationLoaderInterface $configurationLoader
     */
    public function __construct(ConfigurationLoaderInterface $configurationLoader)
    {
        $this->configurationLoader = $configurationLoader;
    }

    /**
     * @throws \Exception
     *
     * @return \Spryker\Configuration\Configuration
     */
    public function buildConfiguration()
    {
        $configuration = new Configuration();
        foreach ($this->configurationLoader->getConfiguration()['stages'] as $stageName => $sections) {
            $stage = new Stage($stageName);
            if (count($sections) === 0) {
                throw new Exception(sprintf('No sections defined in "%s" stage.', $stageName));
            }
            foreach ($sections as $sectionName => $commands) {
                $section = new Section($sectionName);
                if (count($commands) === 0) {
                    throw new Exception(sprintf('No commands defined in "%s" section.', $sectionName));
                }
                foreach ($commands as $commandName => $commandDefinition) {
                    $command = new Command($commandName);
                    $command->setExecutable($commandDefinition['command']);
                    if (isset($commandDefinition['groups'])) {
                        $command->setGroups($commandDefinition['groups']);
                    }
                    $section->addCommand($command);
                }
                $stage->addSection($section);
            }
            $configuration->addStage($stage);
        }

        return $configuration;
    }
}
