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

}
