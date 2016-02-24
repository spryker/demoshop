<?php

namespace Pyz\Zed\Installer\Business\Icecat;

use Propel\Runtime\Propel;
use Spryker\Zed\Installer\Business\Model\AbstractInstaller as SprykerAbstractInstaller;
use Symfony\Component\Console\Output\OutputInterface;

class IcecatDataInstaller extends SprykerAbstractInstaller
{

    /**
     * @var \Symfony\Component\Console\Output\OutputInterface
     */
    protected $output;

    /**
     * @var \Pyz\Zed\Installer\Business\Icecat\AbstractIcecatImporter[]
     */
    protected $installerCollection;

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param \Pyz\Zed\Installer\Business\Icecat\IcecatInstallerInterface[] $installerCollection
     */
    public function __construct(OutputInterface $output, array $installerCollection)
    {
        $this->output = $output;
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
            foreach ($this->installerCollection as $name => $installer) {
                $installer->install($this->output);
            }

            $connection->commit();
        } catch (\Exception $exception) {
            $connection->rollBack();
            throw $exception;
        }
    }

}
