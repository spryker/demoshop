<?php

namespace Pyz\Zed\Console;

use SprykerFeature\Zed\Console\ConsoleConfig as SprykerConsoleConfig;
use Symfony\Component\Console\Command\Command;

class ConsoleConfig extends SprykerConsoleConfig
{

    /**
     * @return Command[]
     */
    public function getConsoleCommands()
    {
        $commands = [
            $this->getLocator()->setup()->consoleRemoveGeneratedDirectoryConsole(),
            $this->getLocator()->setup()->consoleInstallConsole(),
            $this->getLocator()->setup()->consolePropelConsole(),
            $this->getLocator()->setup()->consolePropelBuildModelConsole(),
            $this->getLocator()->setup()->consolePropelBuildSqlConsole(),
            $this->getLocator()->setup()->consolePropelConvertConfigConsole(),
            $this->getLocator()->setup()->consolePropelCreateDatabaseConsole(),
            $this->getLocator()->setup()->consolePropelDiffConsole(),
            $this->getLocator()->setup()->consolePropelInsertSqlConsole(),
            $this->getLocator()->setup()->consolePropelMigrateConsole(),
            $this->getLocator()->setup()->consolePropelSchemaCopyConsole(),
            $this->getLocator()->setup()->consoleGenerateIdeAutoCompletionConsole(),
            $this->getLocator()->setup()->consoleGenerateZedIdeAutoCompletionConsole(),
            $this->getLocator()->setup()->consoleGenerateYvesIdeAutoCompletionConsole(),
            $this->getLocator()->setup()->consoleGenerateSdkIdeAutoCompletionConsole(),
            $this->getLocator()->setup()->consoleNpmRunnerConsole(),
            $this->getLocator()->setup()->consoleJenkinsEnableConsole(),
            $this->getLocator()->setup()->consoleJenkinsDisableConsole(),
            $this->getLocator()->setup()->consoleJenkinsGenerateConsole(),
            $this->getLocator()->setup()->consoleDeployPreparePropelConsole(),
            $this->getLocator()->installer()->consoleInitializeDatabaseConsole(),
            $this->getLocator()->installer()->consoleDemoDataInstallConsole(),
            $this->getLocator()->application()->consoleApplicationIntegrationCheckConsole(),
            $this->getLocator()->frontendExporter()->consoleExportKeyValueConsole(),
            $this->getLocator()->frontendExporter()->consoleExportSearchConsole(),
            $this->getLocator()->frontendExporter()->consoleUpdateSearchConsole(),
            $this->getLocator()->oms()->consoleCheckConditionConsole(),
            $this->getLocator()->oms()->consoleCheckTimeoutConsole(),
            $this->getLocator()->transfer()->consoleGeneratorConsole(),
        ];

        $gitCommands = $this->getLocator()->git()->facade()->getConsoleCommands();
        $commands = array_merge($commands, $gitCommands);

        return $commands;
    }

}
