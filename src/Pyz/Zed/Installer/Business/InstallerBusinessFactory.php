<?php

namespace Pyz\Zed\Installer\Business;

use Pyz\Zed\Installer\Business\Model\Icecat\Installer\IcecatCategoryInstaller;
use Pyz\Zed\Installer\Business\Model\Icecat\Installer\IcecatLocaleInstaller;
use Pyz\Zed\Installer\Business\Model\Icecat\Installer\IcecatProductInstaller;
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
     * @return \Pyz\Zed\Installer\Business\Model\Icecat\AbstractIcecatMapper[]
     */
    public function getIcecatDataMappers()
    {
        return $this->getProvidedDependency(InstallerDependencyProvider::MAPPERS_ICECAT_DATA);
    }

    /**
     * @param OutputInterface $output
     *
     * @return \Spryker\Zed\Installer\Business\Model\AbstractInstaller[]
     */
    public function getIcecatDataInstallers(OutputInterface $output)
    {
        $mappers = $this->getIcecatDataMappers();

        return [
            InstallerConfig::CATEGORY_RESOURCE => new IcecatCategoryInstaller($output, $mappers),
            InstallerConfig::LOCALE_RESOURCE => new IcecatLocaleInstaller($output, $mappers),
            InstallerConfig::PRODUCT_RESOURCE => new IcecatProductInstaller($output, $mappers),
        ];
    }

}
