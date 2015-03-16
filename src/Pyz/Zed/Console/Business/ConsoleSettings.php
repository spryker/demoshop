<?php

namespace Pyz\Zed\Console\Business;

use ProjectA\Zed\Console\Business\ConsoleSettings as SprykerConsoleSettings;
use ProjectA\Zed\Console\Business\Model\Console;
use ProjectA\Zed\Git\Communication\Plugin\Cli\PrepareTag;
use ProjectA\Zed\Installer\Communication\Plugin\Cli\DemoDataInstall;
use ProjectA\Zed\Installer\Communication\Plugin\Cli\InitializeDatabase;
use ProjectA\Zed\Setup\Communication\Plugin\Cli\GenerateIdeAutoCompletion;
use ProjectA\Zed\Setup\Communication\Plugin\Cli\Grunt\Runner as GruntRunner;
use ProjectA\Zed\Setup\Communication\Plugin\Cli\Gulp\Runner as GulpRunner;
use ProjectA\Zed\Setup\Communication\Plugin\Cli\Install;
use ProjectA\Zed\Setup\Communication\Plugin\Cli\Propel;
use Symfony\Component\Console\Command\Command;

class ConsoleSettings extends SprykerConsoleSettings
{

    /**
     * @return Command[]
     */
    public function getConsoleCommands()
    {
        $commands = [
            $this->locator->setup()->pluginCliInstall(),
            $this->locator->setup()->pluginCliPropel(),
            $this->locator->setup()->pluginCliPropelBuildModel(),
            $this->locator->setup()->pluginCliPropelBuildSql(),
            $this->locator->setup()->pluginCliPropelConvertConfig(),
            $this->locator->setup()->pluginCliPropelCreateDatabase(),
            $this->locator->setup()->pluginCliPropelDiff(),
            $this->locator->setup()->pluginCliPropelInsertSql(),
            $this->locator->setup()->pluginCliPropelMigrate(),
            $this->locator->setup()->pluginCliPropelSchemaCopy(),
            $this->locator->setup()->pluginCliGenerateIdeAutoCompletion(),
            $this->locator->installer()->pluginCliInitializeDatabase(),
            $this->locator->installer()->pluginCliDemoDataInstall(),
            $this->locator->setup()->pluginCliGulpRunner(),
            $this->locator->setup()->pluginCliGruntRunner(),
        ];

        $gitCommands = $this->locator->git()->facade()->getConsoleCommands();
        $commands = array_merge($commands, $gitCommands);

        return $commands;
    }

}
