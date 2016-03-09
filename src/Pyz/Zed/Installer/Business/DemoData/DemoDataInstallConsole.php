<?php

namespace Pyz\Zed\Installer\Business\DemoData;

use Spryker\Zed\Console\Business\Model\Console;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @method \Pyz\Zed\Installer\Business\InstallerFacade getFacade()
 */
class DemoDataInstallConsole extends Console
{

    const COMMAND_NAME = 'setup:install-demo-data';
    const DESCRIPTION = 'Install demo data';

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
     * @return null|int null
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $installerPlugins = $this->getInstallerPlugins();

        $messenger = $this->getMessenger();

        try {
            foreach ($installerPlugins as $plugin) {
                $name = $this->getPluginNameFromClass(get_class($plugin));

                $output->writeln('Installing DEMO data for ' . $name);

                $plugin->setMessenger($messenger);
                $plugin->run();
            }
        } catch (\Exception $e) {
            $this->error($e->getMessage());

            return self::CODE_ERROR;
        }

        return self::CODE_SUCCESS;
    }

    /**
     * @return \Spryker\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin[]
     */
    protected function getInstallerPlugins()
    {
        return $this->getFacade()->getDemoDataInstallerPlugins();
    }

    /**
     * @param string $className
     *
     * @return mixed
     */
    protected function getPluginNameFromClass($className)
    {
        $pattern = '#^(.+)\\\(.+)\\\(.+)\\\(.+)\\\(.*)$#i';
        return preg_replace($pattern, '${2}', $className);
    }

}
