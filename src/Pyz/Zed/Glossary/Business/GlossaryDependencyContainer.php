<?php

namespace Pyz\Zed\Glossary\Business;

use Spryker\Zed\Glossary\Business\Key\KeyManager;
use Spryker\Zed\Glossary\Business\Translation\TranslationManager;
use Psr\Log\LoggerInterface;
use Pyz\Zed\Glossary\Business\Internal\DemoData\GlossaryInstall;
use Pyz\Zed\Glossary\GlossaryDependencyProvider;
use Spryker\Zed\Glossary\Business\GlossaryDependencyContainer as SprykerGlossaryDependencyContainer;

class GlossaryDependencyContainer extends SprykerGlossaryDependencyContainer
{

    /**
     * @param LoggerInterface $messenger
     *
     * @return GlossaryInstall
     */
    public function createDemoDataInstaller(LoggerInterface $messenger)
    {
        $installers = [
            $this->getProvidedDependency(GlossaryDependencyProvider::PLUGIN_YML_INSTALLER),
        ];
        $installer = new GlossaryInstall($installers);
        $installer->setMessenger($messenger);

        return $installer;
    }

    /**
     * @return TranslationManagerInterface
     */
    public function createTranslationManager()
    {
        return new TranslationManager(
                    $this->getQueryContainer(),
                    $this->getTouchFacade(),
                    $this->getLocaleFacade(),
                    $this->createKeyManager(),
                    $this->getMessagesFacade()
                );
    }

    /**
     * @return KeyManagerInterface
     */
    public function createKeyManager()
    {
        return new KeyManager(
                    $this->getQueryContainer()
                );
    }

}
