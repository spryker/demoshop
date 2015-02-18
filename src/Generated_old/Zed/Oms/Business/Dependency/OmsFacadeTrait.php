<?php 

namespace Generated\Zed\Oms\Business\Dependency;

use ProjectA\Zed\Oms\Business\OmsFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait OmsFacadeTrait
{
    /**
     * @var OmsFacade
     */
    protected $facadeOms;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeOms(FacadeAbstract $facade)
    {
        $this->facadeOms = $facade;
    }
}
