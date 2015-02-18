<?php 

namespace Generated\Zed\System\Business\Dependency;

use ProjectA\Zed\System\Business\SystemFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait SystemFacadeTrait
{
    /**
     * @var SystemFacade
     */
    protected $facadeSystem;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeSystem(FacadeAbstract $facade)
    {
        $this->facadeSystem = $facade;
    }
}
