<?php

namespace Pyz\Zed\Installer\Business\Model\Icecat;

use Generated\Shared\Transfer\LocaleTransfer;
use Symfony\Component\Console\Output\OutputInterface;

abstract class AbstractIcecatImporter
{

    /**
     * @var IcecatReaderInterface
     */
    protected $xmlReader;

    /**
     * @param LocaleTransfer $localeTransfer
     * @param int $icecatLangId
     *
     * @return void
     */
    abstract public function import(LocaleTransfer $localeTransfer, $icecatLangId);

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
