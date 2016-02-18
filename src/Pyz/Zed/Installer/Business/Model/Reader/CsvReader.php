<?php

namespace Pyz\Zed\Installer\Business\Model\Reader;

use Pyz\Zed\Installer\Business\Exception\DataFileNotFoundException;
use SplFileObject;

class CsvReader implements CsvReaderInterface
{

    /**
     * @var string
     */
    protected $dataDirectory;

    /**
     * @var array
     */
    protected $columns = [];

    /**
     * @param string $dataDirectory
     */
    public function __construct($dataDirectory)
    {
        $this->dataDirectory = $dataDirectory;
    }

    /**
     * @param string $filename
     *
     * @throws \Pyz\Zed\Installer\Business\Exception\DataFileNotFoundException
     *
     * @return \SplFileObject
     */
    public function readCsvFile($filename)
    {
        $filename = $this->dataDirectory . DIRECTORY_SEPARATOR . $filename;

        if (!is_file($filename)) {
            throw new DataFileNotFoundException($filename);
        }

        $csvFile = new SplFileObject($filename);
        $csvFile->setCsvControl(',', '"');
        $csvFile->setFlags(SplFileObject::READ_CSV | SplFileObject::READ_AHEAD | SplFileObject::SKIP_EMPTY | SplFileObject::DROP_NEW_LINE);

        $this->setupColumns($csvFile);

        return $csvFile;
    }

    /**
     * @param \SplFileObject $csvFile
     *
     * @return array
     */
    protected function setupColumns(\SplFileObject $csvFile)
    {
        while (!$csvFile->eof()) {
            $this->columns = $csvFile->fgetcsv();
            break;
        }
    }

    /**
     * @return array
     */
    public function getColumns()
    {
        return $this->columns;
    }

}
