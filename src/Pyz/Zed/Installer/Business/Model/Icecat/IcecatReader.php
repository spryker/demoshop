<?php

namespace Pyz\Zed\Installer\Business\Model\Icecat;

use Pyz\Zed\Installer\Business\Exception\DataFileNotFoundException;

class IcecatReader implements IcecatReaderInterface
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
     * @return bool
     */
    public function isXmlFile($filename)
    {
        return file_exists($this->dataDirectory . '/' . $filename);
    }

    /**
     * @param $filename
     *
     * @throws DataFileNotFoundException
     *
     * @return \SimpleXMLElement
     */
    public function getXml($filename)
    {
        $filename = $this->dataDirectory . '/' . $filename;

        if (!is_file($filename)) {
            throw new DataFileNotFoundException('Xml file for ' . get_class($this) . ' not found under ' . $filename);
        }

        return simplexml_load_file($filename);
    }

    /**
     * @return string
     */
    public function getDataDirectory()
    {
        return $this->dataDirectory;
    }

}
