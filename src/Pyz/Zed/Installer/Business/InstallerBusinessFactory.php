<?php

namespace Pyz\Zed\Installer\Business;

use Pyz\Zed\Installer\Business\Model\Icecat\IcecatInstaller;
use Pyz\Zed\Installer\Business\Model\Icecat\IcecatReader;
use Pyz\Zed\Installer\Business\Model\Icecat\Importer\CategoryImporter;
use Pyz\Zed\Installer\Business\Model\Icecat\Importer\LocaleImporter;
use Pyz\Zed\Installer\Business\Model\Icecat\Importer\ProductImporter;
use Pyz\Zed\Installer\InstallerConfig;
use Spryker\Zed\Installer\Business\InstallerBusinessFactory as SprykerInstallerBusinessFactory;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @method \Pyz\Zed\Installer\InstallerConfig getConfig()
 */
class InstallerBusinessFactory extends SprykerInstallerBusinessFactory
{

    /**
     * @return \Spryker\Zed\Installer\Business\Model\AbstractInstaller[]
     */
    public function getIcecatDataImporters()
    {
        $reader = $this->getIcecatReader();

        return [
            InstallerConfig::CATEGORY_RESOURCE => new CategoryImporter($reader),
            InstallerConfig::LOCALE_RESOURCE => new LocaleImporter($reader),
            InstallerConfig::PRODUCT_RESOURCE => new ProductImporter($reader),
        ];
    }

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return \Pyz\Zed\Installer\Business\Model\Icecat\IcecatInstaller
     */
    public function getIcecatDataInstaller(OutputInterface $output)
    {
        $importerCollection = $this->getIcecatDataImporters();

        return new IcecatInstaller($output, $importerCollection);
    }

    /**
     * @return \Pyz\Zed\Installer\Business\Model\Icecat\IcecatReader
     */
    public function getIcecatReader()
    {
        $path = $this->getConfig()->getIcecatDataPath();

        return new IcecatReader($path);
    }

}
