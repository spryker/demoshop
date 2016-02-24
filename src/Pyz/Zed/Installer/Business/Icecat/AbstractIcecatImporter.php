<?php

namespace Pyz\Zed\Installer\Business\Icecat;

use Pyz\Zed\Installer\Business\Reader\CsvReaderInterface;
use Symfony\Component\Console\Output\OutputInterface;

abstract class AbstractIcecatImporter implements IcecatImporterInterface
{

    /**
     * @var \Pyz\Zed\Installer\Business\Reader\CsvReaderInterface
     */
    protected $csvReader;

    /**
     * @var \Pyz\Zed\Installer\Business\Icecat\IcecatLocaleManager
     */
    protected $localeManager;

    /**
     * @var string
     */
    protected $columnsHeader;

    /**
     * @var bool
     */
    protected $beforeExecuted = false;

    /**
     * @var bool
     */
    protected $afterExecuted = false;

    /**
     * @param array $columns
     * @param array $data
     *
     * @return void
     */
    abstract public function importOne(array $columns, array $data);

    /**
     * @return bool
     */
    abstract public function canImport();

    /**
     * @param \Pyz\Zed\Installer\Business\Reader\CsvReaderInterface $csvReader
     * @param \Pyz\Zed\Installer\Business\Icecat\IcecatLocaleManager $localeManager
     */
    public function __construct(CsvReaderInterface $csvReader, IcecatLocaleManager $localeManager)
    {
        $this->csvReader = $csvReader;
        $this->localeManager = $localeManager;
    }

    /**
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
     * @param array $data
     *
     * @return array
     */
    protected function format(array $data)
    {
        return $data;
    }

    /**
     * @return void
     */
    protected function before()
    {

    }
    /**
     * @return void
     */
    protected function after()
    {

    }

    /**
     * @return void
     */
    public function beforeImport()
    {
        if (!$this->beforeExecuted) {
            $this->before();
            $this->beforeExecuted = true;
        }
    }

    /**
     * @return void
     */
    public function afterImport()
    {
        if (!$this->afterExecuted) {
            $this->after();
            $this->afterExecuted = true;
        }
    }

}
