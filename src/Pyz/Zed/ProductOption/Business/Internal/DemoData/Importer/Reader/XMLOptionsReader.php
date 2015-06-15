<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Reader;

use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Transformer\XMLOptionsTransformer;

class XMLOptionsReader extends XMLReader implements OptionReaderInterface
{

    const OPTION_ELEMENT_NAME = 'option';

    /**
     * @var XMLOptionsTransformer
     */
    private $transformer;

    /**
     * @param string $filePath
     * @param XMLOptionsTransformer $transformer
     */
    public function __construct(
        $filePath,
        XMLOptionsTransformer $transformer
    ) {
        $this->transformer = $transformer;
        parent::__construct($filePath);
    }

    /**
     * @return \Generator
     */
    public function getOptions()
    {
        foreach($this->getNextNode(self::OPTION_ELEMENT_NAME) as $node) {
            yield $this->transformer->transform($node);
        }
    }
}
