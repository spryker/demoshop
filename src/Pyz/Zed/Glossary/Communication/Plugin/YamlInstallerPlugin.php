<?php

/*
 * (c) Copyright Spryker Systems GmbH 2015
 */

namespace Pyz\Zed\Glossary\Communication\Plugin;

use Generated\Shared\Transfer\LocaleTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\Glossary\Dependency\Plugin\GlossaryInstallerPluginInterface;
use Symfony\Component\Yaml\Yaml;

/**
 * @method \Pyz\Zed\Glossary\Business\GlossaryFacade getFacade()
 * @method \Spryker\Zed\Glossary\Persistence\GlossaryQueryContainer getQueryContainer()
 * @method \Spryker\Zed\Glossary\Communication\GlossaryCommunicationFactory getFactory()
 */
class YamlInstallerPlugin extends AbstractPlugin implements GlossaryInstallerPluginInterface
{

    public function installGlossaryData()
    {
        $filePath = __DIR__ . '/../../File/initial_translation.yml';
        $translations = $this->parseYamlFile($filePath);
        $this->installKeysAndTranslations($translations);
    }

    /**
     * @param string $filePath
     *
     * @return array
     */
    protected function parseYamlFile($filePath)
    {
        $yamlParser = new Yaml();

        return $yamlParser->parse(file_get_contents($filePath));
    }

    /**
     * @param array $translations
     */
    protected function installKeysAndTranslations(array $translations)
    {
        $glossaryFacade = $this->getFacade();
        foreach ($translations['keys'] as $keyName => $data) {
            if (!$glossaryFacade->hasKey($keyName)) {
                $glossaryFacade->createKey($keyName);
            }

            foreach ($data['translations'] as $localeName => $text) {
                $localeDto = new LocaleTransfer();
                $localeDto->setLocaleName($localeName);
                if (!$glossaryFacade->hasTranslation($keyName, $localeDto)) {
                    $glossaryFacade->createAndTouchTranslation($keyName, $localeDto, $text, true);
                }
            }
        }
    }

}
