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
     * @return SplFileObject
     */
    public function getCsvIterator($filename)
    {
        $filename = $this->dataDirectory . '/ ' . $filename;

        $iterator = $this->generateIteratorFile($filename);
        $iterator->setCsvControl(',', '"', '\\');
        $iterator->setFlags(SplFileObject::READ_CSV | SplFileObject::READ_AHEAD | SplFileObject::SKIP_EMPTY);

        return $iterator;
    }

    /**
     * @param string $filename
     *
     * @throws \Pyz\Zed\Installer\Business\Exception\DataFileNotFoundException
     *
     * @return SplFileObject
     */
    protected function generateIteratorFile($filename)
    {
        if (!is_file($filename)) {
            throw new DataFileNotFoundException($filename);
        }

        return new SplFileObject($filename);
    }

}
