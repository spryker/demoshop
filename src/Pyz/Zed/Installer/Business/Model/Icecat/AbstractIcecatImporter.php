<?php

namespace Pyz\Zed\Installer\Business\Model\Icecat;

use Pyz\Zed\Installer\Business\Model\Reader\CsvReaderInterface;
use Symfony\Component\Console\Output\OutputInterface;

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
     * @var string
     */
    protected $columnsHeader;

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return void
     */
    abstract protected function importData(OutputInterface $output);

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
     * TODO move it to csvReader
     *
     * @param array $columns
     * @param array $data
     *
     * @return array
     */
    protected function generateCsvItem(array $columns, array $data)
    {
        return array_combine(array_values($columns), array_values($data));
    }

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return void
     */
    public function import(OutputInterface $output)
    {
        if (!$this->canImport()) {
            return;
        }

        $this->importData($output);
    }

}
