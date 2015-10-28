<?php

namespace Pyz\Zed\Glossary\Business;

use Psr\Log\LoggerInterface;
use Pyz\Zed\Glossary\Business\Internal\DemoData\GlossaryInstall;
use Pyz\Zed\Glossary\GlossaryDependencyProvider;
use SprykerFeature\Zed\Glossary\Business\GlossaryDependencyContainer as SprykerGlossaryDependencyContainer;
use Pyz\Zed\Glossary\GlossaryConfig;

/**
 * @method GlossaryConfig getConfig()
 */
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
        $installer = $this->getFactory()->createInternalDemoDataGlossaryInstall($installers);
        $installer->setMessenger($messenger);

        return $installer;
    }

    /**
     * @return RemoteCSV
     */
    public function createRemoteCSV()
    {
        return $this->getFactory()->createRemoteCSV(
            $this->getConfig()->getRemoteCSVUrl(),
            $this->createKeyManager(),
            $this->createTranslationManager(),
            $this->getProvidedDependency(GlossaryDependencyProvider::FACADE_LOCALE)
        );
    }
}
