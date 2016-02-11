<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Reader;

interface ProductReaderInterface
{

    /**
     * @return \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductAbstract[]
     */
    public function getProducts();

}
