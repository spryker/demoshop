<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */
namespace Pyz\Zed\Installer\Business\Model\Icecat;

use Symfony\Component\Console\Output\OutputInterface;

interface IcecatImporterInterface
{

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return void
     */
    public function import(OutputInterface $output);

    /**
     * @return bool
     */
    public function canImport();

}
