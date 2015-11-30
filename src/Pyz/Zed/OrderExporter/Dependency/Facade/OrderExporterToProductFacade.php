<?php

namespace Pyz\Zed\OrderExporter\Dependency\Facade;

interface OrderExporterToProductFacade
{

    /**
     * @param string $sku
     * @return int
     */
    public function getAbstractProductIdByConcreteSku($sku);
}
