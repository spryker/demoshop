<?php

/*
 * (c) Copyright Spryker Systems GmbH 2015
 */

namespace Pyz\Zed\Glossary\Communication\Plugin;

use Generated\Shared\Transfer\LocaleTransfer;
use SprykerEngine\Zed\Kernel\Communication\AbstractPlugin;
use SprykerFeature\Zed\Glossary\Communication\GlossaryDependencyContainer;
use SprykerFeature\Zed\Glossary\Dependency\Plugin\GlossaryInstallerPluginInterface;
use Symfony\Component\Yaml\Yaml;

/**
 * @method GlossaryDependencyContainer getDependencyContainer()
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
        $glossaryFacade = $this->getDependencyContainer()->createGlossaryFacade();
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
