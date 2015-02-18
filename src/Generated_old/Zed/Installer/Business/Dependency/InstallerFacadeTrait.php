<?php 

namespace Generated\Zed\Installer\Business\Dependency;

use ProjectA\Zed\Installer\Business\InstallerFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait InstallerFacadeTrait
{
    /**
     * @var InstallerFacade
     */
    protected $facadeInstaller;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeInstaller(FacadeAbstract $facade)
    {
        $this->facadeInstaller = $facade;
    }
}
