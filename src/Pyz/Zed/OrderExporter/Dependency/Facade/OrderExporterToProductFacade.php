<?php

namespace Pyz\Zed\OrderExporter\Dependency\Facade;

use Orm\Zed\Product\Persistence\SpyProduct;

interface OrderExporterToProductFacade
{

    /**
     * @param string $sku
     * @return int
     */
    public function getAbstractProductIdByConcreteSku($sku);

    /**
     * @param string $concreteSku
     * @return SpyProduct
     */
    public function getConcreteProduct($concreteSku);
}
