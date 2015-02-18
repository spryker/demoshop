<?php 

namespace Generated\Zed\Salesrule\Business\Dependency;

use ProjectA\Zed\Salesrule\Business\SalesruleFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait SalesruleFacadeTrait
{
    /**
     * @var SalesruleFacade
     */
    protected $facadeSalesrule;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeSalesrule(FacadeAbstract $facade)
    {
        $this->facadeSalesrule = $facade;
    }
}
