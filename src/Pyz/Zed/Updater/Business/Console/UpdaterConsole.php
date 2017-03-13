<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Updater\Business\Console;

use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UpdaterConsole
{

    /**
     * @var \Symfony\Component\Console\Output\OutputInterface
     */
    protected $output;

    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $messenger;

    /**
     * @var \Pyz\Zed\Importer\Business\Installer\InstallerInterface[]
     */
    protected $installerCollection;

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param \Psr\Log\LoggerInterface $messenger
     * @param \Pyz\Zed\Importer\Business\Installer\InstallerInterface[] $installerCollection
     */
    public function __construct(OutputInterface $output, LoggerInterface $messenger, array $installerCollection)
    {
        $this->output = $output;
        $this->messenger = $messenger;
        $this->installerCollection = $installerCollection;
    }

    /**
     * @return void
     */
    public function import()
    {
        $this->output->writeln('Updating...');

        foreach ($this->installerCollection as $installer) {
            if ($installer->isInstalled()) {
                $this->output->writeln($installer->getTitle() . ' already updated.');
                continue;
            }

            $installer->install($this->output, $this->messenger);
        }

        $this->output->writeln('All done.');
    }

}
