<?php 

namespace Generated\Zed\Misc\Business\Dependency;

use ProjectA\Zed\Misc\Business\MiscFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait MiscFacadeTrait
{
    /**
     * @var MiscFacade
     */
    protected $facadeMisc;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeMisc(FacadeAbstract $facade)
    {
        $this->facadeMisc = $facade;
    }
}
