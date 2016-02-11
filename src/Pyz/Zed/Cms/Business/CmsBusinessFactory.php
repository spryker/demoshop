<?php

namespace Pyz\Zed\Cms\Business;

use Spryker\Zed\Cms\Business\Mapping\GlossaryKeyMappingManager;
use Pyz\Zed\Cms\Business\Internal\DemoData\CmsInstall;
use Pyz\Zed\Cms\CmsDependencyProvider;
use Spryker\Zed\Messenger\Business\Model\MessengerInterface;
use Spryker\Zed\Cms\Business\CmsBusinessFactory as SprykerCmsBusinessFactory;

/**
 * @method \Pyz\Zed\Cms\CmsConfig getConfig()
 * @method \Pyz\Zed\Cms\Persistence\CmsQueryContainer getQueryContainer()
 */
class CmsBusinessFactory extends SprykerCmsBusinessFactory
{

    /**
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     *
     * @return \Pyz\Zed\Cms\Business\Internal\DemoData\CmsInstall
     */
    public function createDemoDataInstaller(MessengerInterface $messenger)
    {
        $installer = new CmsInstall(
            $this->getGlossaryFacade(),
            $this->getUrlFacade(),
            $this->getLocaleFacade(),
            $this->createTemplateManager(),
            $this->createPageManager(),
            $this->createGlossaryKeyMappingManager(),
            $this->createBlockManager(),
            $this->getQueryContainer(),
            $this->getConfig()
        );
        $installer->setMessenger($messenger);

        return $installer;
    }

    /**
     * @return \Spryker\Zed\Locale\Business\LocaleFacade
     */
    public function getLocaleFacade()
    {
        return $this->getProvidedDependency(CmsDependencyProvider::FACADE_LOCALE);
    }

    /**
     * @return \Spryker\Zed\Cms\Business\Mapping\GlossaryKeyMappingManagerInterface
     */
    public function createGlossaryKeyMappingManager()
    {
        return new GlossaryKeyMappingManager(
            $this->getGlossaryFacade(),
            $this->getQueryContainer(),
            $this->createTemplateManager(),
            $this->createPageManager(),
            $this->getProvidedDependency(CmsDependencyProvider::PLUGIN_PROPEL_CONNECTION)
        );
    }

}
