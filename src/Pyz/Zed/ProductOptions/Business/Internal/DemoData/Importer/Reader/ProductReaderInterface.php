<?php

namespace Pyz\Zed\ProductOptions\Business\Internal\DemoData\Importer\Reader;

use Pyz\Zed\ProductOptions\Business\Internal\DemoData\Importer\Node\AbstractProduct;

interface ProductReaderInterface
{

    /**
     * @return AbstractProduct[]
     */
    public function getProducts();
}
