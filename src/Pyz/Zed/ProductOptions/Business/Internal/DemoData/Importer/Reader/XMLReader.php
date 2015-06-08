<?php

namespace Pyz\Zed\ProductOptions\Business\Internal\DemoData\Importer\Reader;

abstract class XMLReader
{

    /**
     * @var string
     */
    private $filePath;

    /**
     * @var \XMLReader
     */
    private $reader;

    /**
     * @param string $filePath
     */
    public function __construct(
        $filePath
    ) {
        $this->filePath = $filePath;
        $this->reader = new \XMLReader();
    }

    /**
     * @param string $target
     *
     * @return \Generator
     */
    protected function getNextNode($target)
    {
        $this->reader->open($this->filePath, 'UTF-8');

        while ($this->reader->read()) {
            if ($this->reader->nodeType == \XMLREADER::ELEMENT && $this->reader->localName == $target) {
                $doc = new \DOMDocument('1.0', 'UTF-8');
                $xml = simplexml_import_dom($doc->importNode($this->reader->expand(), true));
                $this->reader->next();
                yield $xml;
            }
        }

        $this->reader->close();
    }
}
