<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Reader;

use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductAbstract;

interface ProductReaderInterface
{

    /**
     * @return ProductAbstract[]
     */
    public function getProducts();

}
