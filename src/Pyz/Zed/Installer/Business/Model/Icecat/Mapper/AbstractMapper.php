<?php

namespace Pyz\Zed\Installer\Business\Model\Icecat\Mapper;

abstract class AbstractMapper
{
    /**
     * @var string $dataDirectory
     */
    protected $dataDirectory;

    /**
     * @param string $icecatDataDirectory
     */
    public function __construct($icecatDataDirectory)
    {
        $this->dataDirectory = $icecatDataDirectory;
    }

    /**
     * @return array
     */
    abstract protected function getIcecatData();

    /**
     * @param string $filename
     *
     * @return string
     */
    public function generateDataFileName($filename)
    {
        return $this->dataDirectory . '/' . $filename;
    }

    /**
     * @param string $filename
     *
     * @return \SimpleXMLElement
     */
    public function loadXmlFromFile($filename)
    {
        return simplexml_load_file($filename);
    }
}
