<?php

namespace Pyz\Zed\Installer\Business\Model\Icecat;

use Pyz\Zed\Installer\InstallerConfig;
use Spryker\Shared\Kernel\Store;
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


    public function install()
    {
        $locales = Store::getInstance()->getLocales();

        foreach ($locales as $locale) {
            $this->getCategoryImporter()->import($locale);
        }
    }

    /**
     * @return \Pyz\Zed\Installer\Business\Model\Icecat\Importer\CategoryImporter
     */
    protected function getCategoryImporter()
    {
        return $this->importerCollection[InstallerConfig::CATEGORY_RESOURCE];
    }

    /**
     * @return \Pyz\Zed\Installer\Business\Model\Icecat\Importer\LocaleImporter
     */
    protected function getLocaleImporter()
    {
        return $this->importerCollection[InstallerConfig::LOCALE_RESOURCE];
    }

    /**
     * @return \Pyz\Zed\Installer\Business\Model\Icecat\Importer\ProductImporter
     */
    protected function getProductImporter()
    {
        return $this->importerCollection[InstallerConfig::PRODUCT_RESOURCE];
    }
}
