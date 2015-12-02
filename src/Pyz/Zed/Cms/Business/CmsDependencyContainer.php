<?php

namespace Pyz\Zed\Cms\Business;

use Pyz\Zed\Cms\Business\Internal\DemoData\CmsInstall;
use Pyz\Zed\Cms\Business\Page\PageManager;
use Pyz\Zed\Cms\CmsDependencyProvider;
use Pyz\Zed\Glossary\Business\GlossaryFacade;
use Pyz\Zed\Locale\Business\LocaleFacade;
use Pyz\Zed\Url\Business\UrlFacade;
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
            $this->getTemplateManager(),
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
