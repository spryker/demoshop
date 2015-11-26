<?php

namespace Pyz\Zed\Installer\Communication\Console;

use SprykerFeature\Zed\Installer\Communication\Console\DemoDataInstallConsole as SprykerDemoDataInstallConsole;

use SprykerFeature\Zed\Installer\Business\InstallerFacade;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @method InstallerFacade getFacade()
 */
class DemoDataInstallConsole extends SprykerDemoDataInstallConsole
{

    const ARG_INSTALLER_FILTER = 'run';

    protected function configure()
    {
        parent::configure();

        $description = 'Allow to run single installers only. Identifiers are keys of InstallerConfig:getDemoDataInstallerStack';

        $this->addArgument(
            self::ARG_INSTALLER_FILTER,
            InputArgument::IS_ARRAY | InputArgument::OPTIONAL,
            $description
        );
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $installerPlugins = $this->getFacade()->getDemoDataInstaller();

        $filter = $input->hasArgument(self::ARG_INSTALLER_FILTER) ? $filter = $input->getArgument(self::ARG_INSTALLER_FILTER) : [];

        if (!empty($filter)) {
            $installerPluginsFiltered = [];
            foreach ($filter as $ident) {
                if (isset($installerPlugins[$ident])) {
                    $installerPluginsFiltered[$ident] = $installerPlugins[$ident];
                }
            }
            $installerPlugins = $installerPluginsFiltered;
        }

        $messenger = $this->getMessenger();

        foreach ($installerPlugins as $installer) {
            $installer->setMessenger($messenger);
            $output->writeln(date('c') . ' Next importer ' . get_class($installer));
            $installer->install();
            $output->writeln('Done ' . get_class($installer));
        }
    }

}
