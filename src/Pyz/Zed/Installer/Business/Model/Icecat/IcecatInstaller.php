<?php

namespace Pyz\Zed\Installer\Business\Model\Icecat;

use Propel\Runtime\Propel;
use Pyz\Zed\Installer\InstallerConfig;
use Spryker\Zed\Installer\Business\Model\AbstractInstaller as SprykerAbstractInstaller;
use Symfony\Component\Console\Output\OutputInterface;

class IcecatInstaller extends SprykerAbstractInstaller
{

    /**
     * @var \Symfony\Component\Console\Output\OutputInterface
     */
    protected $output;

    /**
     * @var \Pyz\Zed\Installer\Business\Model\Icecat\AbstractIcecatImporter[]
     */
    protected $importerCollection;

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param \Pyz\Zed\Installer\Business\Model\Icecat\AbstractIcecatImporter[] $importerCollection
     */
    public function __construct(OutputInterface $output, array $importerCollection)
    {
        $this->output = $output;
        $this->importerCollection = $importerCollection;
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
            foreach ($this->importerCollection as $name => $importer) {
                $importer->import();
            }

            $connection->commit();
        } catch (\Exception $exception) {
            $connection->rollBack();
            throw $exception;
        }
    }

    /**
     * @return \Pyz\Zed\Installer\Business\Model\Icecat\Importer\CategoryImporter
     */
    protected function getCategoryImporter()
    {
        return $this->importerCollection[InstallerConfig::RESOURCE_CATEGORY];
    }

    /**
     * @return \Pyz\Zed\Installer\Business\Model\Icecat\Importer\ProductImporter
     */
    protected function getProductImporter()
    {
        return $this->importerCollection[InstallerConfig::RESOURCE_PRODUCT];
    }

}
