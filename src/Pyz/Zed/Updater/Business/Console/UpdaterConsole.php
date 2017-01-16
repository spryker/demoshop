<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Updater\Business\Console;

use Spryker\Zed\Messenger\Business\Model\MessengerInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UpdaterConsole
{

    /**
     * @var \Symfony\Component\Console\Output\OutputInterface
     */
    protected $output;

    /**
     * @var \Spryker\Zed\Messenger\Business\Model\MessengerInterface
     */
    protected $messenger;

    /**
     * @var \Pyz\Zed\Importer\Business\Installer\InstallerInterface[]
     */
    protected $installerCollection;

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     * @param \Pyz\Zed\Importer\Business\Installer\InstallerInterface[] $installerCollection
     */
    public function __construct(OutputInterface $output, MessengerInterface $messenger, array $installerCollection)
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

        foreach ($this->installerCollection as $name => $installer) {
            if (!$installer->isInstalled()) {
                $installer->install($this->output, $this->messenger);
            } else {
                $this->output->writeln($installer->getTitle() . ' already updated.');
            }
        }

        $this->output->writeln('All done.');
    }

}
