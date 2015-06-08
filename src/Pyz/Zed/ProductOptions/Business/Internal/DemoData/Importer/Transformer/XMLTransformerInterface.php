<?php

namespace Pyz\Zed\ProductOptions\Business\Internal\DemoData\Importer\Transformer;

interface XMLTransformerInterface
{

    /**
     * @param \SimpleXMLElement $node
     *
     * @return mixed
     */
    public function transform(\SimpleXMLElement $node);
}
