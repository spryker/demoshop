<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Reader;

use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Transformer\XMLProductTransformer;

class XMLProductReader extends XMLReader implements ProductReaderInterface
{

    const PRODUCT_ELEMENT_NAME = 'product';

    /**
     * @var XMLProductTransformer
     */
    private $transformer;

    /**
     * @param string $filePath
     * @param XMLProductTransformer $transformer
     */
    public function __construct(
        $filePath,
        XMLProductTransformer $transformer
    ) {
        $this->transformer = $transformer;
        parent::__construct($filePath);
    }

    /**
     * @return \Generator
     */
    public function getProducts()
    {
        foreach($this->getNextNode(self::PRODUCT_ELEMENT_NAME) as $node) {
            yield $this->transformer->transform($node);
        }
    }
}
