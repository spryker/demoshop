<?php

namespace Pyz\Zed\Glossary\Business;

use Spryker\Zed\Glossary\Business\Key\KeyManager;
use Spryker\Zed\Glossary\Business\Translation\TranslationManager;
use Pyz\Zed\Glossary\Business\Internal\DemoData\GlossaryInstall;
use Pyz\Zed\Glossary\GlossaryDependencyProvider;
use Spryker\Zed\Glossary\Business\GlossaryBusinessFactory as SprykerGlossaryBusinessFactory;
use Spryker\Zed\Messenger\Business\Model\MessengerInterface;

class GlossaryBusinessFactory extends SprykerGlossaryBusinessFactory
{

    /**
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     *
     * @return \Pyz\Zed\Glossary\Business\Internal\DemoData\GlossaryInstall
     */
    public function createDemoDataInstaller(MessengerInterface $messenger)
    {
        $installers = [
            $this->getProvidedDependency(GlossaryDependencyProvider::PLUGIN_YML_INSTALLER),
        ];
        $installer = new GlossaryInstall($installers);
        $installer->setMessenger($messenger);

        return $installer;
    }

    /**
     * @return \Spryker\Zed\Glossary\Business\Translation\TranslationManagerInterface
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
     * @return \Spryker\Zed\Glossary\Business\Key\KeyManagerInterface
     */
    public function createKeyManager()
    {
        return new KeyManager(
            $this->getQueryContainer()
        );
    }

}
