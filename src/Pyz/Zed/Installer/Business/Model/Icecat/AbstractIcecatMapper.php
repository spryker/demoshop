<?php

namespace Pyz\Zed\Installer\Business\Model\Icecat;

use Pyz\Zed\Installer\Business\Exception\XmlFileNotFoundException;

abstract class AbstractIcecatMapper implements IcecatMapperInterface
{

    /**
     * @var string
     */
    protected $dataDirectory;

    /**
     * @var string
     */
    protected $dataFilename;

    /**
     * @param string $icecatDataDirectory
     */
    public function __construct($icecatDataDirectory)
    {
        $this->dataDirectory = $icecatDataDirectory;
    }

    /**
     * @throws XmlFileNotFoundException
     *
     * @return \SimpleXMLElement
     */
    public function getXml()
    {
        $filename = $this->generateDataFileName($this->dataFilename);
        if (!is_file($filename)) {
            throw new XmlFileNotFoundException($filename);
        }

        return simplexml_load_file($filename);
    }

    /**
     * @param string $filename
     *
     * @return string
     */
    public function generateDataFileName($filename)
    {
        return $this->dataDirectory . '/' . $filename;
    }

}
