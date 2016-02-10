<?php

namespace Pyz\Zed\Installer\Business\Model\Icecat;

use Symfony\Component\Console\Output\OutputInterface;

abstract class AbstractIcecatImporter
{

    /**
     * @var IcecatReaderInterface
     */
    protected $xmlReader;

    /**
     * @param string $localeName
     * @param $icecatLangId
     * @return
     * @internal param int $icecatLocaleId
     *
     */
    abstract public function import($localeName, $icecatLangId);

    /**
     * IcecatInstaller constructor.
     */
    public function __construct(IcecatReaderInterface $xmlReader)
    {
        $this->xmlReader = $xmlReader;
    }

    /**
     * @param \SimpleXMLElement $xmlElement
     * @param string $path
     * @param string $attributeName
     *
     * @return null|string
     */
    protected function getXmlAttributeValue(\SimpleXMLElement $xmlElement, $path, $attributeName='Value')
    {
        $data = $xmlElement->xpath($path);
        if (!$data) {
            return null;
        }

        $data = current($data);
        if (!$data) {
            return null;
        }

        $attributes = $data->attributes();

        return (string) $attributes->{$attributeName};
    }

}
