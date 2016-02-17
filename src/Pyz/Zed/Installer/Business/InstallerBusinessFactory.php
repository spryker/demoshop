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
        return [
            InstallerConfig::RESOURCE_CATEGORY => $this->getCategoryImporter(),
            InstallerConfig::RESOURCE_PRODUCT => $this->getProductImporter(),
        ];
    }

    /**
     * @return \Pyz\Zed\Installer\Business\Model\Icecat\Importer\CategoryImporter
     */
    protected function getCategoryImporter()
    {
        $csvReader = $this->getCsvReader();
        $localeManager = $this->getIcecatLocaleManager();
        $categoryFacade = $this->getProvidedDependency(InstallerDependencyProvider::FACADE_CATEGORY);

        $categoryImporter = new CategoryImporter($csvReader, $localeManager);
        $categoryImporter->setCategoryFacade($categoryFacade);

        return $categoryImporter;
    }

    /**
     * @return \Pyz\Zed\Installer\Business\Model\Icecat\Importer\ProductImporter
     */
    protected function getProductImporter()
    {
        $csvReader = $this->getCsvReader();
        $localeManager = $this->getIcecatLocaleManager();
        $productFacade = $this->getProvidedDependency(InstallerDependencyProvider::FACADE_PRODUCT);

        $productImporter = new ProductImporter($csvReader, $localeManager);
        $productImporter->setProductFacade($productFacade);

        return $productImporter;
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
