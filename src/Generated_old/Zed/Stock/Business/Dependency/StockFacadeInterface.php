<?php 

namespace Generated\Zed\Stock\Business\Dependency;

use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

interface StockFacadeInterface
{

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeStock(FacadeAbstract $facade);

}
