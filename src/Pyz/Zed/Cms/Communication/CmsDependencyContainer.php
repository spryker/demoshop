<?php

namespace Pyz\Zed\Cms\Communication;

use Pyz\Zed\Cms\Business\CmsFacade;
use SprykerFeature\Zed\Cms\Communication\CmsDependencyContainer as SprykerCmsDependencyContainer;

/**
 * Class CmsDependencyContainer
 *
 * @package Pyz\Zed\Cms\Communication
 */
class CmsDependencyContainer extends SprykerCmsDependencyContainer
{

    /**
     * @return CmsFacade
     */
    public function getInstallerFacade()
    {
        return $this->getLocator()->Cms()->facade();
    }

}
