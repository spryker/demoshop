<?php

namespace Pyz\Zed\ProductOptions\Business\Internal\DemoData\Importer\Transformer;

interface XMLTransformerInterface
{

    /**
     * @param \SimpleXMLElement $element
     *
     * @return mixed
     */
    public function transform(\SimpleXMLElement $element);
}
