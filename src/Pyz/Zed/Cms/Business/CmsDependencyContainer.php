<?php

namespace Pyz\Zed\Cms\Business;

use Pyz\Zed\Cms\Business\Internal\DemoData\CmsInstall;
use SprykerEngine\Shared\Kernel\Messenger\MessengerInterface;
use SprykerFeature\Zed\Cms\Business\CmsDependencyContainer as SprykerCmsDependencyContainer;

class CmsDependencyContainer extends SprykerCmsDependencyContainer
{

    /**
     * @param MessengerInterface $messenger
     *
     * @return CmsInstall
     */
    public function createDemoDataInstaller(MessengerInterface $messenger)
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
     * @return GlossaryFacade
     */
    public function createGlossaryFacade()
    {
        return $this->getExternalDependency()->glossary()->facade();
    }

    /**
     * @return UrlFacade
     */
    public function createUrlFacade()
    {
        return $this->getExternalDependency()->url()->facade();
    }

    /**
     * @return LocaleFacade
     */
    public function createLocaleFacade()
    {
        return $this->getExternalDependency()->locale()->facade();
    }

}
