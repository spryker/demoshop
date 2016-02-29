<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Console;

use Spryker\Shared\Library\Environment;
use Spryker\Zed\Application\Communication\Console\ApplicationIntegrationCheckConsole;
use Spryker\Zed\Application\Communication\Console\BuildNavigationConsole;
use Spryker\Zed\Cache\Communication\Console\DeleteAllCachesConsole;
use Spryker\Zed\Collector\Communication\Console\CollectorSearchExportConsole;
use Spryker\Zed\Collector\Communication\Console\CollectorSearchUpdateConsole;
use Spryker\Zed\Collector\Communication\Console\CollectorStorageExportConsole;
use Spryker\Zed\Console\ConsoleDependencyProvider as SprykerConsoleDependencyProvider;
use Spryker\Zed\Development\Communication\Console\CodeCreateConsole;
use Spryker\Zed\Development\Communication\Console\CodePhpMessDetectorConsole;
use Spryker\Zed\Development\Communication\Console\CodeStyleFixerConsole;
use Spryker\Zed\Development\Communication\Console\CodeStyleSnifferConsole;
use Spryker\Zed\Development\Communication\Console\CodeTestConsole;
use Spryker\Zed\Installer\Communication\Console\DemoDataInstallConsole;
use Spryker\Zed\Installer\Communication\Console\InitializeDatabaseConsole;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Maintenance\Communication\Console\ComposerJsonUpdaterConsole;
use Spryker\Zed\Maintenance\Communication\Console\DependencyTreeBuilderConsole;
use Spryker\Zed\Maintenance\Communication\Console\DependencyTreeDependencyViolationConsole;
use Spryker\Zed\Maintenance\Communication\Console\FossMarkDownGeneratorConsole;
use Spryker\Zed\NewRelic\Communication\Console\RecordDeploymentConsole;
use Spryker\Zed\Oms\Communication\Console\CheckConditionConsole;
use Spryker\Zed\Oms\Communication\Console\CheckTimeoutConsole;
use Spryker\Zed\ProductSearch\Communication\Console\ProductSearchConsole;
use Spryker\Zed\Search\Communication\Console\SearchConsole;
use Spryker\Zed\Transfer\Communication\Console\GeneratorConsole;

class ConsoleDependencyProvider extends SprykerConsoleDependencyProvider
{

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Symfony\Component\Console\Command\Command[]
     */
    public function getConsoleCommands(Container $container)
    {
        $commands = [
            new ApplicationIntegrationCheckConsole(),
            new BuildNavigationConsole(),
            new CheckConditionConsole(),
            new CheckTimeoutConsole(),
            new CollectorStorageExportConsole(),
            new CollectorSearchExportConsole(),
            new CollectorSearchUpdateConsole(),
            new DeleteAllCachesConsole(),
            new DemoDataInstallConsole(),
            new DependencyTreeBuilderConsole(),
            new DependencyTreeDependencyViolationConsole(),
            new FossMarkDownGeneratorConsole(),
            new GeneratorConsole(),
            new InitializeDatabaseConsole(),
            new ProductSearchConsole(),
            new RecordDeploymentConsole(),
            new SearchConsole(),
            new ComposerJsonUpdaterConsole(),
        ];

        $propelCommands = $container->getLocator()->propel()->facade()->getConsoleCommands();
        $commands = array_merge($commands, $propelCommands);

        $setupCommands = $container->getLocator()->setup()->facade()->getConsoleCommands();
        $commands = array_merge($commands, $setupCommands);

        $gitCommands = $container->getLocator()->git()->facade()->getConsoleCommands();
        $commands = array_merge($commands, $gitCommands);

        if (Environment::isDevelopment()) {
            $commands[] = new CodeTestConsole();
            $commands[] = new CodeStyleSnifferConsole();
            $commands[] = new CodeCreateConsole();
            $commands[] = new CodePhpMessDetectorConsole();
        }

        return $commands;
    }

}
