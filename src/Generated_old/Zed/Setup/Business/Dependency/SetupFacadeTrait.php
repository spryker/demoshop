<?php 

namespace Generated\Zed\Setup\Business\Dependency;

use ProjectA\Zed\Setup\Business\SetupFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait SetupFacadeTrait
{
    /**
     * @var SetupFacade
     */
    protected $facadeSetup;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeSetup(FacadeAbstract $facade)
    {
        $this->facadeSetup = $facade;
    }
}
