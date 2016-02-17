<?php

namespace Pyz\Zed\Installer\Business;

use Pyz\Zed\Installer\Business\Model\Icecat\IcecatInstaller;
use Pyz\Zed\Installer\Business\Model\Icecat\Importer\CategoryImporter;
use Pyz\Zed\Installer\Business\Model\Icecat\Importer\ProductImporter;
use Pyz\Zed\Installer\Business\Model\Icecat\IcecatLocaleManager;
use Pyz\Zed\Installer\Business\Model\Reader\CsvReader;
use Pyz\Zed\Installer\InstallerConfig;
use Pyz\Zed\Installer\InstallerDependencyProvider;
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
        $csvReader = $this->getCsvReader();
        $localeManager = $this->getIcecatLocaleManager();

        return [
            InstallerConfig::CATEGORY_RESOURCE => new CategoryImporter(
                $csvReader,
                $localeManager,
                $this->getProvidedDependency(InstallerDependencyProvider::FACADE_CATEGORY)
            ),
            InstallerConfig::PRODUCT_RESOURCE => new ProductImporter($csvReader, $localeManager),
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
     * @return \Pyz\Zed\Installer\Business\Model\Reader\CsvReaderInterface
     */
    public function getCsvReader()
    {
        $path = $this->getConfig()->getIcecatDataPath();

        return new CsvReader($path);
    }

    /**
     * @throws \Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return IcecatLocaleManager
     */
    public function getIcecatLocaleManager()
    {
        return new IcecatLocaleManager(
            $this->getProvidedDependency(InstallerDependencyProvider::FACADE_LOCALE)
        );
    }

}
