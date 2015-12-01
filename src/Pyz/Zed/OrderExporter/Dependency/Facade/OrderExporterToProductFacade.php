<?php

namespace Pyz\Zed\OrderExporter\Dependency\Facade;

use Generated\Shared\Product\ConcreteProductInterface;

interface OrderExporterToProductFacade
{
    /**
     * @param string $sku
     * @return int
     */
    public function getAbstractProductIdByConcreteSku($sku);

    /**
     * @param string $concreteSku
     * @return ConcreteProductInterface
     */
    public function getConcreteProductByConcreteSku($concreteSku);
}
