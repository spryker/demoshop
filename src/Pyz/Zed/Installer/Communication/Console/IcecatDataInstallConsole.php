<?php

namespace Pyz\Zed\Installer\Communication\Console;

use Spryker\Shared\Kernel\Store;
use Spryker\Zed\Console\Business\Model\Console as SprykerConsole;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @method \Pyz\Zed\Installer\Business\InstallerFacade getFacade()
 */
class IcecatDataInstallConsole extends SprykerConsole
{

    const COMMAND_NAME = 'setup:install-icecat-data';
    const DESCRIPTION = 'Install Icecat demo data http://icecat.biz';

    /**
     * @return void
     */
    protected function configure()
    {
        $this->setName(self::COMMAND_NAME)
            ->setDescription(self::DESCRIPTION);
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $messenger = $this->getMessenger();

        $installer = $this->getFacade()->getIcecatDataInstaller($output);
        $installer->setMessenger($messenger);
        $installer->install();
    }

}
