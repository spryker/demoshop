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
     * @var string
     */
    protected $columnHeader;

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
    public function getCsvIterator($filename)
    {
        return $this->csvReader->getCsvIterator($filename);
    }

    /**
     * @return array
     */
    public function getColumns()
    {
        if ($this->columns === null) {
            $this->columns = explode(",\n", trim((string) $this->columnHeader));
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
