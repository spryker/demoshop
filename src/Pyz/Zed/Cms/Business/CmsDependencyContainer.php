<?php

namespace Pyz\Zed\Cms\Business;

use Pyz\Zed\Cms\Business\Internal\DemoData\CmsInstall;
use Pyz\Zed\Cms\CmsDependencyProvider;
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
            $this->getConfig()
        );
        $installer->setMessenger($messenger);

        return $installer;
    }

    /**
     * @return GlossaryFacade
     */
    public function createGlossaryFacade()
    {
        return $this->getProvidedDependency(CmsDependencyProvider::FACADE_GLOSSARY);
    }

    /**
     * @return UrlFacade
     */
    public function createUrlFacade()
    {
        return $this->getProvidedDependency(CmsDependencyProvider::FACADE_URL);
    }

    /**
     * @return LocaleFacade
     */
    public function createLocaleFacade()
    {
        return $this->getProvidedDependency(CmsDependencyProvider::FACADE_LOCALE);
    }

}
