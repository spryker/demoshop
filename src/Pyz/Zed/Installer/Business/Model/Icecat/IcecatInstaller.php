<?php

namespace Pyz\Zed\Installer\Business\Model\Icecat;

use Propel\Runtime\Propel;
use Pyz\Zed\Installer\InstallerConfig;
use Spryker\Shared\Kernel\Store;
use Spryker\Zed\Installer\Business\Model\AbstractInstaller as SprykerAbstractInstaller;
use Spryker\Zed\Locale\Business\LocaleFacade;
use Symfony\Component\Console\Output\OutputInterface;

class IcecatInstaller extends SprykerAbstractInstaller
{

    /**
     * @var \Symfony\Component\Console\Output\OutputInterface
     */
    protected $output;

    /**
     * @var LocaleFacade
     */
    protected $localeFacade;

    /**
     * @var \Pyz\Zed\Installer\Business\Model\Icecat\AbstractIcecatImporter[]
     */
    protected $importerCollection;

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param \Spryker\Zed\Locale\Business\LocaleFacade $localeFacade
     * @param \Pyz\Zed\Installer\Business\Model\Icecat\AbstractIcecatImporter[] $importerCollection
     */
    public function __construct(OutputInterface $output, LocaleFacade $localeFacade, array $importerCollection)
    {
        $this->output = $output;
        $this->importerCollection = $importerCollection;
        $this->localeFacade = $localeFacade;
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
            $locales = Store::getInstance()->getLocales();

            foreach ($locales as $localeName) {
                $localeTransfer = $this->localeFacade->getLocale($localeName);
                $icecatLocaleId = $this->getLocaleImporter()->getIcecatLocaleId($localeName);
                $this->getCategoryImporter()->import($localeTransfer, $icecatLocaleId);
                //$this->getProductImporter()->import($localeName, $icecatLocaleId);
            }

            $connection->commit();
        } catch (\Exception $exception) {
            $connection->rollBack();
            throw $exception;
        }
    }

    /**
     * @param string $locale
     *
     * @return void
     */
    public function importProducts($locale)
    {
        //$this->getProductImporter()->import($locale,);
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
