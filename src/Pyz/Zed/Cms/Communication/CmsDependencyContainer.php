<?php

namespace Pyz\Zed\Cms\Communication;

use Pyz\Zed\Cms\Business\CmsFacade;
use SprykerFeature\Zed\Cms\Communication\CmsDependencyContainer as SprykerCmsDependencyContainer;

/**
 * Class CmsDependencyContainer
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

    /**
     * @return \Pyz\Zed\Glossary\Business\GlossaryFacade
     */
    public function getGlossaryFacade() {
        return $this->getLocator()->glossary()->facade();
    }

    /**
     * @return \Pyz\Zed\Url\Business\UrlFacade
     */
    public function getUrlFacade() {
        return $this->getLocator()->url()->facade();
    }
}
