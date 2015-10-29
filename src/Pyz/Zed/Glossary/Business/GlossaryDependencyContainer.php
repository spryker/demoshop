<?php

namespace Pyz\Zed\Glossary\Business;

use Psr\Log\LoggerInterface;
use Pyz\Zed\Glossary\Business\Internal\DemoData\GlossaryInstall;
use Pyz\Zed\Glossary\GlossaryDependencyProvider;
use SprykerFeature\Zed\Glossary\Business\GlossaryDependencyContainer as SprykerGlossaryDependencyContainer;
use Pyz\Zed\Glossary\GlossaryConfig;
use Pyz\Zed\Glossary\Persistence\GlossaryQueryContainer;

/**
 * @method GlossaryConfig getConfig()
 * @method GlossaryQueryContainer getQueryContainer()
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
            $this->getConfig()->getRemoteCSVUrl()
        );
    }

    /**
     * @return Importer
     * @throws \ErrorException
     */
    public function createImporter()
    {
        return $this->getFactory()->createImporter(
            $this->createRemoteCSV(),
            $this->createKeyManager(),
            $this->createTranslationManager(),
            $this->getProvidedDependency(GlossaryDependencyProvider::FACADE_LOCALE)
        );
    }

    /**
     * @return TranslationReader
     */
    public function createTranslationReader()
    {
        return $this->getFactory()->createTranslationReader(
            $this->getQueryContainer()
        );
    }
}
