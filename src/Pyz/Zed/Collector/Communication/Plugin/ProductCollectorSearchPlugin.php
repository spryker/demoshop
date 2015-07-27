<?php

namespace Pyz\Zed\Collector\Communication\Plugin;

use SprykerEngine\Zed\Kernel\Communication\AbstractPlugin;

class ProductCollectorSearchPlugin extends AbstractPlugin
{

    /**
     * @return string
     */
    public function getTouchItemType()
    {
        return 'abstract_product';
    }

}