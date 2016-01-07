<?php

namespace Pyz\Zed\Cms\Business;

use Pyz\Zed\Cms\CmsConfig;
use Spryker\Zed\Cms\Business\Block\BlockManagerInterface;
use Spryker\Zed\Cms\Business\Mapping\GlossaryKeyMappingManager;
use Spryker\Zed\Cms\Business\Block\BlockManager;
use Spryker\Zed\Cms\Business\Mapping\GlossaryKeyMappingManagerInterface;
use Spryker\Zed\Cms\Business\Page\PageManagerInterface;
use Spryker\Zed\Cms\Business\Template\TemplateManager;
use Spryker\Zed\Cms\Business\Page\PageManager;
use Pyz\Zed\Cms\Business\Internal\DemoData\CmsInstall;
use Pyz\Zed\Cms\CmsDependencyProvider;
use Pyz\Zed\Glossary\Business\GlossaryFacade;
use Spryker\Shared\Kernel\Messenger\MessengerInterface;
use Spryker\Zed\Cms\Business\CmsBusinessFactory as SprykerCmsBusinessFactory;
use Spryker\Zed\Cms\Business\Template\TemplateManagerInterface;
use Pyz\Zed\Cms\Persistence\CmsQueryContainer;
use Spryker\Zed\Locale\Business\LocaleFacade;
use Spryker\Zed\Url\Business\UrlFacade;

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
            $this->getCmsQueryContainer(),
            $this->getConfig()
        );
        $installer->setMessenger($messenger);

        return $installer;
    }

    /**
     * @return GlossaryFacade
     */
    public function getGlossaryFacade()
    {
        return $this->getProvidedDependency(CmsDependencyProvider::FACADE_GLOSSARY);
    }

    /**
     * @return UrlFacade
     */
    public function getUrlFacade()
    {
        return $this->getProvidedDependency(CmsDependencyProvider::FACADE_URL);
    }

    /**
     * @return LocaleFacade
     */
    public function getLocaleFacade()
    {
        return $this->getProvidedDependency(CmsDependencyProvider::FACADE_LOCALE);
    }

    /**
     * @return PageManagerInterface
     */
    public function createPageManager()
    {
        return new PageManager(
            $this->getCmsQueryContainer(),
            $this->createTemplateManager(),
            $this->createBlockManager(),
            $this->getGlossaryFacade(),
            $this->getTouchFacade(),
            $this->getUrlFacade()
        );
    }

    /**
     * @return TemplateManagerInterface
     */
    public function createTemplateManager()
    {
        return new TemplateManager(
            $this->getCmsQueryContainer(),
            $this->getConfig(),
            $this->createFinder()
        );
    }

    /**
     * @return BlockManagerInterface
     */
    public function createBlockManager()
    {
        return new BlockManager(
            $this->getCmsQueryContainer(),
            $this->getTouchFacade(),
            $this->getProvidedDependency(CmsDependencyProvider::PLUGIN_PROPEL_CONNECTION)
        );
    }

    /**
     * @return GlossaryKeyMappingManagerInterface
     */
    public function createGlossaryKeyMappingManager()
    {
        return new GlossaryKeyMappingManager(
            $this->getGlossaryFacade(),
            $this->getCmsQueryContainer(),
            $this->createTemplateManager(),
            $this->createPageManager(),
            $this->getProvidedDependency(CmsDependencyProvider::PLUGIN_PROPEL_CONNECTION)
        );
    }

}
