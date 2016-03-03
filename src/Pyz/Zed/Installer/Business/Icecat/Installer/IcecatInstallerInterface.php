<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */
namespace Pyz\Zed\Installer\Business\Icecat\Installer;

use Spryker\Zed\Messenger\Business\Model\MessengerInterface;
use Symfony\Component\Console\Output\OutputInterface;

interface IcecatInstallerInterface
{

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     *
     * @return void
     */
    public function install(OutputInterface $output, MessengerInterface $messenger);

    /**
     * @return bool
     */
    public function isInstalled();

    /**
     * @return string
     */
    public function getTitle();

}
