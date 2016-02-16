<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */
namespace Pyz\Zed\Installer\Business\Model\Icecat;

use Pyz\Zed\Installer\Business\Exception\DataFileNotFoundException;

interface IcecatReaderInterface
{

    /**
     * @param $filename
     *
     * @throws DataFileNotFoundException
     *
     * @return \SimpleXMLElement
     */
    public function getXml($filename);

    /**
     * @return string
     */
    public function getDataDirectory();

    /**
     * @param string $filename
     *
     * @return bool
     */
    public function isXmlFile($filename);

}
