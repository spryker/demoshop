<?php

namespace Pyz\Zed\Installer\Business\Model\Icecat;

use Pyz\Zed\Installer\Business\Exception\XmlFileNotFoundException;

interface IcecatMapperInterface
{

    /**
     * @throws XmlFileNotFoundException
     *
     * @return \SimpleXMLElement
     */
    public function getXml();

    /**
     * @param string $filename
     *
     * @return string
     */
    public function generateDataFileName($filename);

}
