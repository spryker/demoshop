<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Reader;

use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\AbstractProduct;

interface ProductReaderInterface
{

    /**
     * @return AbstractProduct[]
     */
    public function getProducts();
}
