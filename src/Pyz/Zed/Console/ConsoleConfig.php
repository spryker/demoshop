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
            $this->getLocator()->application()->consoleApplicationIntegrationCheckConsole(),
            $this->getLocator()->frontendExporter()->consoleExportKeyValueConsole(),
            $this->getLocator()->frontendExporter()->consoleExportSearchConsole(),
            $this->getLocator()->frontendExporter()->consoleUpdateSearchConsole(),
            $this->getLocator()->installer()->consoleInitializeDatabaseConsole(),
            $this->getLocator()->installer()->consoleDemoDataInstallConsole(),
            $this->getLocator()->oms()->consoleCheckConditionConsole(),
            $this->getLocator()->oms()->consoleCheckTimeoutConsole(),
            $this->getLocator()->maintenance()->consoleFossMarkDownGeneratorConsole(),
            $this->getLocator()->setup()->consoleRemoveGeneratedDirectoryConsole(),
            $this->getLocator()->setup()->consoleInstallConsole(),
            $this->getLocator()->propel()->consolePropelConsole(),
            $this->getLocator()->propel()->consoleBuildModelConsole(),
            $this->getLocator()->propel()->consoleBuildSqlConsole(),
            $this->getLocator()->propel()->consoleConvertConfigConsole(),
            $this->getLocator()->propel()->consoleCreateDatabaseConsole(),
            $this->getLocator()->propel()->consoleDiffConsole(),
            $this->getLocator()->propel()->consoleInsertSqlConsole(),
            $this->getLocator()->propel()->consoleMigrateConsole(),
            $this->getLocator()->propel()->consoleSchemaCopyConsole(),
            $this->getLocator()->setup()->consoleGenerateIdeAutoCompletionConsole(),
            $this->getLocator()->setup()->consoleGenerateZedIdeAutoCompletionConsole(),
            $this->getLocator()->setup()->consoleGenerateYvesIdeAutoCompletionConsole(),
            $this->getLocator()->setup()->consoleGenerateClientIdeAutoCompletionConsole(),
            $this->getLocator()->setup()->consoleNpmRunnerConsole(),
            $this->getLocator()->setup()->consoleJenkinsEnableConsole(),
            $this->getLocator()->setup()->consoleJenkinsDisableConsole(),
            $this->getLocator()->setup()->consoleJenkinsGenerateConsole(),
            $this->getLocator()->setup()->consoleDeployPreparePropelConsole(),
            $this->getLocator()->transfer()->consoleGeneratorConsole(),
        ];

        $gitCommands = $this->getLocator()->git()->facade()->getConsoleCommands();
        $commands = array_merge($commands, $gitCommands);

        return $commands;
    }

}
