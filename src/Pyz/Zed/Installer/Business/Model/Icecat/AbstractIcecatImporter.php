<?php

namespace Pyz\Zed\Installer\Business\Model\Icecat;

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
     * @return void
     */
    abstract protected function importData();

    /**
     * @return string
     */
    abstract protected function getColumnHeader();

    /**
     * @return bool
     */
    abstract public function canImport();

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
        $csvFile = $this->csvReader->getCsvFile($filename);

        //advance past columns
        while (!$csvFile->eof()) {
            $csvFile->fgetcsv();
            break;
        }

        return $csvFile;
    }

    /**
     * @return array
     */
    protected function getColumns()
    {
        if ($this->columns === null) {
            $this->columns = explode(',', trim((string) $this->getColumnHeader()));

            array_walk($this->columns, function (&$item) {
                $item = trim($item);
            });
        }

        return $this->columns;
    }

    /**
     * @param array $data
     *
     * @return array
     */
    protected function generateCsvItem(array $data)
    {
        $columns = $this->getColumns();

        dump(array_values($columns), array_values($data));

        return array_combine(array_values($columns), array_values($data));
    }

    /**
     * @return void
     */
    public function import()
    {
        if (!$this->canImport()) {
            return;
        }

        $this->importData();
    }

}
