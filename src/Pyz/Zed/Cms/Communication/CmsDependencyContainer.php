<?php

namespace Pyz\Zed\Cms\Communication;

use Pyz\Zed\Cms\Business\CmsFacade;
use SprykerFeature\Zed\Cms\Communication\CmsDependencyContainer as SprykerCmsDependencyContainer;

class CmsDependencyContainer extends SprykerCmsDependencyContainer
{

    /**
     * @return CmsFacade
     */
    public function getInstallerFacade()
    {
        return $this->getInstallerFacade()->cms()->facade();
    }

}
