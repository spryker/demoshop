<?php

namespace Pyz\Zed\Cms\Business;

use Psr\Log\LoggerInterface;
use Pyz\Zed\Cms\Business\Internal\DemoData\CmsInstall;
use SprykerFeature\Zed\Cms\Business\CmsDependencyContainer as SprykerCmsDependencyContainer;

/**
 * Class CmsDependencyContainer
 *
 * @package Pyz\Zed\Cms\Business
 */
class CmsDependencyContainer extends SprykerCmsDependencyContainer
{

    /**
     * @param LoggerInterface $messenger
     *
     * @return CmsInstall
     */
    public function createDemoDataInstaller(LoggerInterface $messenger)
    {
        $installer = $this->getFactory()->createInternalDemoDataCmsInstall(
            $this->createGlossaryFacade(),
            $this->createUrlFacade(),
            $this->createLocaleFacade(),
            $this->getTemplateManager(),
            $this->getPageManager(),
            $this->getGlossaryKeyMappingManager(),
            $this->getConfig()->getDemoDataPath(),
            $this->getConfig()->getDemoDataContentKey(),
            $this->getConfig()->getDemoDataTemplate(),
            $this->getConfig()->getDemoDataTemplateName()
        );
        $installer->setMessenger($messenger);

        return $installer;
    }


    /**
     * @return \Pyz\Zed\Glossary\Business\GlossaryFacade
     */
    public function createGlossaryFacade()
    {
        return $this->getLocator()->glossary()->facade();
    }

    /**
     * @return \Pyz\Zed\Url\Business\UrlFacade
     */
    public function createUrlFacade()
    {
        return $this->getLocator()->url()->facade();
    }

    /**
     * @return \Pyz\Zed\Locale\Business\LocaleFacade
     */
    public function createLocaleFacade()
    {
        return $this->getLocator()->locale()->facade();
    }

}
