<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */
namespace Pyz\Zed\Installer\Business\Icecat;

use Symfony\Component\Console\Output\OutputInterface;

interface IcecatInstallerInterface
{

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return void
     */
    public function install(OutputInterface $output);

}
