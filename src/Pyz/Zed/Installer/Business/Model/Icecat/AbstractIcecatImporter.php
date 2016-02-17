<?php

namespace Pyz\Zed\Installer\Business\Model\Icecat;

use Generated\Shared\Transfer\LocaleTransfer;
use Pyz\Zed\Installer\Business\Model\Reader\CsvReaderInterface;
use SplFileObject;

abstract class AbstractIcecatImporter implements IcecatImporterInterface
{

    /**
     * @var \Pyz\Zed\Installer\Business\Model\Reader\CsvReaderInterface
     */
    protected $csvReader;

    /**
     * @var array
     */
    protected $columns;

    /**
     * @var \Pyz\Zed\Installer\Business\Model\Icecat\IcecatLocaleManager
     */
    protected $localeManager;

    /**
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     * @param \Pyz\Zed\Installer\Business\Model\Icecat\IcecatLocale $icecatLocale
     *
     * @return void
     */
    abstract protected function importData(LocaleTransfer $localeTransfer, IcecatLocale $icecatLocale);

    /**
     * @return string
     */
    abstract protected function getColumnHeader();

    /**
     * @param \Pyz\Zed\Installer\Business\Model\Reader\CsvReaderInterface $csvReader
     * @param \Pyz\Zed\Installer\Business\Model\Icecat\IcecatLocaleManager $localeManager
     */
    public function __construct(CsvReaderInterface $csvReader, IcecatLocaleManager $localeManager)
    {
        $this->csvReader = $csvReader;
        $this->localeManager = $localeManager;
    }

    /**
     * @param string $filename
     *
     * @return SplFileObject
     */
    protected function getCsvFile($filename)
    {
        return $this->csvReader->getCsvFile($filename);
    }

    /**
     * @return array
     */
    protected function getColumns()
    {
        if ($this->columns === null) {
            $this->columns = explode(",\n", trim((string) $this->getColumnHeader()));
        }

        return $this->columns;
    }

    /**
     * @return void
     */
    public function import()
    {
        $locales = $this->localeManager->getLocaleTransferCollection();

        foreach ($locales as $localeCode => $localeTransfer) {
            $icecatLocale = $this->localeManager->getLocaleByCode($localeCode);
            $this->importData($localeTransfer, $icecatLocale);
        }
    }

}
