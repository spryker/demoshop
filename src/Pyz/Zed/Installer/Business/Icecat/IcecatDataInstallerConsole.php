<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Installer\Business\Icecat;

use Propel\Runtime\Propel;
use Spryker\Zed\Messenger\Business\Model\MessengerInterface;
use Symfony\Component\Console\Output\OutputInterface;

class IcecatDataInstallerConsole
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
     * @var \Pyz\Zed\Installer\Business\Icecat\Installer\IcecatInstallerInterface[]
     */
    protected $installerCollection;

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     * @param \Pyz\Zed\Installer\Business\Icecat\Installer\IcecatInstallerInterface[] $installerCollection
     */
    public function __construct(OutputInterface $output, MessengerInterface $messenger, array $installerCollection)
    {
        $this->output = $output;
        $this->messenger = $messenger;
        $this->installerCollection = $installerCollection;
    }

    /**
     * @throws \Exception
     *
     * @return void
     */
    public function install()
    {
        $connection = Propel::getConnection();
        $connection->beginTransaction();

        try {
            $this->output->writeln('Installing Icecat data...');

            foreach ($this->installerCollection as $name => $installer) {
                if (!$installer->isInstalled()) {
                    $installer->install($this->output, $this->messenger);
                } else {
                    $this->output->writeln($installer->getTitle(). ' already installed.');
                }
            }

            $this->output->writeln('All done.');

            $connection->commit();
        } catch (\Exception $exception) {
            $connection->rollBack();
            throw $exception;
        }
    }

}
