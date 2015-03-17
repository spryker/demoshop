<?php

namespace Pyz\Zed\Console\Business;

use ProjectA\Zed\Console\Business\ConsoleSettings as SprykerConsoleSettings;
use ProjectA\Zed\Setup\Communication\Plugin\Cli\Propel;
use Symfony\Component\Console\Command\Command;

class ConsoleSettings extends SprykerConsoleSettings
{

    /**
     * @return Command[]
     */
    public function getConsoleCommands()
    {
        return [
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
            $this->locator->git()->pluginCliPrepareTag(),
        ];
    }

}
