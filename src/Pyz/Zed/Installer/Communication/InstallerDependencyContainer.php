<?php

namespace Pyz\Zed\Installer\Communication;

use Pyz\Zed\Installer\Business\InstallerFacade;
use ProjectA\Zed\Kernel\Communication\AbstractDependencyContainer;

class InstallerDependencyContainer extends AbstractDependencyContainer
{

    /**
     * @return InstallerFacade
     */
    public function getInstallerFacade()
    {
        return $this->locator->installer()->facade();
    }

}
