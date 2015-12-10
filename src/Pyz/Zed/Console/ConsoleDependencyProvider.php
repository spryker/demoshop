<?php

namespace Pyz\Zed\Console;

use Pyz\Zed\MailQueue\Communication\Console\MailQueueConsole;
use SprykerEngine\Zed\Transfer\Communication\Console\GeneratorConsole;
use SprykerFeature\Shared\Library\Environment;
use SprykerFeature\Zed\Application\Communication\Console\ApplicationIntegrationCheckConsole;
use SprykerFeature\Zed\Application\Communication\Console\BuildNavigationConsole;
use SprykerFeature\Zed\Cache\Communication\Console\DeleteAllCachesConsole;
use SprykerFeature\Zed\Collector\Communication\Console\CollectorSearchExportConsole;
use SprykerFeature\Zed\Collector\Communication\Console\CollectorSearchUpdateConsole;
use SprykerFeature\Zed\Collector\Communication\Console\CollectorStorageExportConsole;
use SprykerFeature\Zed\Development\Communication\Console\CodeStyleFixerConsole;
use SprykerFeature\Zed\Development\Communication\Console\CodeStyleSnifferConsole;
use SprykerFeature\Zed\Development\Communication\Console\CodeTestConsole;
use SprykerFeature\Zed\Installer\Communication\Console\DemoDataInstallConsole;
use SprykerFeature\Zed\Installer\Communication\Console\InitializeDatabaseConsole;
use SprykerFeature\Zed\Maintenance\Communication\Console\FossMarkDownGeneratorConsole;
use SprykerFeature\Zed\NewRelic\Communication\Console\RecordDeploymentConsole;
use SprykerFeature\Zed\Oms\Communication\Console\CheckConditionConsole;
use SprykerFeature\Zed\Oms\Communication\Console\CheckTimeoutConsole;
use SprykerFeature\Zed\ProductSearch\Communication\Console\ProductSearchConsole;
use SprykerFeature\Zed\Queue\Communication\Console\QueueWorkerConsole;
use SprykerFeature\Zed\Search\Communication\Console\SearchConsole;
use Symfony\Component\Console\Command\Command;
use SprykerEngine\Zed\Kernel\Container;
use SprykerFeature\Zed\Console\ConsoleDependencyProvider as SprykerConsoleDependencyProvider;

class ConsoleDependencyProvider extends SprykerConsoleDependencyProvider
{

    /**
     * @param Container $container
     *
     * @return Command[]
     */
    public function getConsoleCommands(Container $container)
    {
        $commands = [
            new ApplicationIntegrationCheckConsole(),
            new BuildNavigationConsole(),
            new CollectorStorageExportConsole(),
            new CollectorSearchExportConsole(),
            new CollectorSearchUpdateConsole(),
            new InitializeDatabaseConsole(),
            new DemoDataInstallConsole(),
            new CheckConditionConsole(),
            new CheckTimeoutConsole(),
            new GeneratorConsole(),
            new ProductSearchConsole(),
            new SearchConsole(),
            new DeleteAllCachesConsole(),
            new RecordDeploymentConsole(),
            new QueueWorkerConsole(),
            new MailQueueConsole(),
            new FossMarkDownGeneratorConsole(),
        ];

        $propelCommands = $container->getLocator()->propel()->facade()->getConsoleCommands();
        $commands = array_merge($commands, $propelCommands);

        $setupCommands = $container->getLocator()->setup()->facade()->getConsoleCommands();
        $commands = array_merge($commands, $setupCommands);

        $gitCommands = $container->getLocator()->git()->facade()->getConsoleCommands();
        $commands = array_merge($commands, $gitCommands);

        if (Environment::isDevelopment()) {
            $commands[] = new CodeTestConsole();
            $commands[] = new CodeStyleFixerConsole();
            $commands[] = new CodeStyleSnifferConsole();
        }

        return $commands;
    }

}
