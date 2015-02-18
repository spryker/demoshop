<?php 

namespace Generated\Zed\Payone\Business\Dependency;

use ProjectA\Zed\Payone\Business\PayoneFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait PayoneFacadeTrait
{
    /**
     * @var PayoneFacade
     */
    protected $facadePayone;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadePayone(FacadeAbstract $facade)
    {
        $this->facadePayone = $facade;
    }
}
