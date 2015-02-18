<?php 

namespace Generated\Zed\Price\Business\Dependency;

use ProjectA\Zed\Price\Business\PriceFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait PriceFacadeTrait
{
    /**
     * @var PriceFacade
     */
    protected $facadePrice;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadePrice(FacadeAbstract $facade)
    {
        $this->facadePrice = $facade;
    }
}
