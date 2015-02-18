<?php 

namespace Generated\Zed\Sales\Business\Dependency;

use Pyz\Zed\Sales\Business\SalesFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait SalesFacadeTrait
{
    /**
     * @var SalesFacade
     */
    protected $facadeSales;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeSales(FacadeAbstract $facade)
    {
        $this->facadeSales = $facade;
    }
}
