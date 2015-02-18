<?php 

namespace Generated\Zed\Stock\Business\Dependency;

use ProjectA\Zed\Stock\Business\StockFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait StockFacadeTrait
{
    /**
     * @var StockFacade
     */
    protected $facadeStock;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeStock(FacadeAbstract $facade)
    {
        $this->facadeStock = $facade;
    }
}
