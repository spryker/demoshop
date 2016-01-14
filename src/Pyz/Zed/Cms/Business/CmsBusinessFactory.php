<?php

namespace Pyz\Zed\Cms\Business;

use Pyz\Zed\Cms\CmsConfig;
use Spryker\Zed\Cms\Business\Mapping\GlossaryKeyMappingManager;
use Spryker\Zed\Cms\Business\Mapping\GlossaryKeyMappingManagerInterface;
use Pyz\Zed\Cms\Business\Internal\DemoData\CmsInstall;
use Pyz\Zed\Cms\CmsDependencyProvider;
use Spryker\Zed\Messenger\Business\Model\MessengerInterface;
use Spryker\Zed\Cms\Business\CmsBusinessFactory as SprykerCmsBusinessFactory;
use Pyz\Zed\Cms\Persistence\CmsQueryContainer;
use Spryker\Zed\Locale\Business\LocaleFacade;

/**
 * @method CmsConfig getConfig()
 * @method CmsQueryContainer getQueryContainer()
 */
class CmsBusinessFactory extends SprykerCmsBusinessFactory
{

    /**
     * @param MessengerInterface $messenger
     *
     * @return CmsInstall
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
     * @return LocaleFacade
     */
    public function getLocaleFacade()
    {
        return $this->getProvidedDependency(CmsDependencyProvider::FACADE_LOCALE);
    }

    /**
     * @return GlossaryKeyMappingManagerInterface
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
