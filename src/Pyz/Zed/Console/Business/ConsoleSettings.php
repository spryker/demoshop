<?php

namespace Pyz\Zed\Console\Business;

use ProjectA\Zed\Console\Business\ConsoleSettings as SprykerConsoleSettings;
use Symfony\Component\Console\Command\Command;

class ConsoleSettings extends SprykerConsoleSettings
{

    /**
     * @return Command[]
     */
    public function getConsoleCommands()
    {
        $commands = [
            $this->locator->setup()->consoleInstallConsole(),
            $this->locator->setup()->consolePropelConsole(),
            $this->locator->setup()->consolePropelBuildModelConsole(),
            $this->locator->setup()->consolePropelBuildSqlConsole(),
            $this->locator->setup()->consolePropelConvertConfigConsole(),
            $this->locator->setup()->consolePropelCreateDatabaseConsole(),
            $this->locator->setup()->consolePropelDiffConsole(),
            $this->locator->setup()->consolePropelInsertSqlConsole(),
            $this->locator->setup()->consolePropelMigrateConsole(),
            $this->locator->setup()->consolePropelSchemaCopyConsole(),
            $this->locator->setup()->consoleGenerateIdeAutoCompletionConsole(),
            $this->locator->setup()->consoleGulpRunnerConsole(),
            $this->locator->setup()->consoleGruntRunnerConsole(),
            $this->locator->installer()->consoleInitializeDatabaseConsole(),
            $this->locator->installer()->consoleDemoDataInstallConsole(),
            $this->locator->application()->consoleApplicationIntegrationCheckConsole(),
            $this->locator->frontendExporter()->consoleExportKeyValueConsole(),
            $this->locator->frontendExporter()->consoleExportSearchConsole(),
            $this->locator->frontendExporter()->consoleUpdateSearchConsole(),
            $this->locator->oms()->consoleCheckConditionConsole(),
            $this->locator->oms()->consoleCheckTimeoutConsole(),
//            $this->locator->mail()->consoleSendMailConsole(),
        ];

        $gitCommands = $this->locator->git()->facade()->getConsoleCommands();
        $commands = array_merge($commands, $gitCommands);

        return $commands;
    }

}
