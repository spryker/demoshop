<?php

namespace Pyz\Zed\Installer\Business\Model\Icecat;

use Pyz\Zed\Installer\Business\Exception\DataFileNotFoundException;
use Symfony\Component\Console\Output\OutputInterface;
use \SplFileObject;

abstract class AbstractIcecatImporter
{

    /**
     * @var string
     */
    protected $dataDirectory;

    /**
     * @param $dataDirectory
     */
    public function __construct($dataDirectory)
    {
        $this->dataDirectory = $dataDirectory;
    }

    /**
     * @param string $filename
     *
     * @throws DataFileNotFoundException
     * @return SplFileObject
     */
    public function getCsvIterator($filename)
    {
        $filename = $this->dataDirectory . '/ ' . $filename;
        if (!is_file($filename)) {
            throw new DataFileNotFoundException($filename);
        }
        $iterator = new SplFileObject($filename);
        $iterator->setCsvControl(',', '"', '\\');
        $iterator->setFlags(SplFileObject::READ_CSV | SplFileObject::READ_AHEAD | SplFileObject::SKIP_EMPTY);

        return $iterator;
    }

}
