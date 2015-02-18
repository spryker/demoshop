<?php 

namespace Generated\Zed\Kendo\Business\Dependency;

use ProjectA\Zed\Kendo\Business\KendoFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait KendoFacadeTrait
{
    /**
     * @var KendoFacade
     */
    protected $facadeKendo;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeKendo(FacadeAbstract $facade)
    {
        $this->facadeKendo = $facade;
    }
}
