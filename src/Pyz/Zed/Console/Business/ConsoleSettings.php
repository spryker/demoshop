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
        ];

        $gitCommands = $this->locator->git()->facade()->getConsoleCommands();
        $commands = array_merge($commands, $gitCommands);

        return $commands;
    }

}
