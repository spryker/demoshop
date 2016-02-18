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
    public function getCsvFile($filename)
    {
        $filename = $this->dataDirectory . DIRECTORY_SEPARATOR . $filename;

        if (!is_file($filename)) {
            throw new DataFileNotFoundException($filename);
        }

        $csvFile = new SplFileObject($filename);
        $csvFile->setCsvControl(',', '"');
        $csvFile->setFlags(SplFileObject::READ_CSV | SplFileObject::READ_AHEAD | SplFileObject::SKIP_EMPTY | SplFileObject::DROP_NEW_LINE);

        return $csvFile;
    }

}
