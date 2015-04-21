<?php

/*
 * (c) Copyright Spryker Systems GmbH 2015
 */

namespace Pyz\Zed\Glossary\Communication\Plugin;

use SprykerEngine\Zed\Kernel\Communication\AbstractPlugin;
use SprykerFeature\Zed\Glossary\Communication\GlossaryDependencyContainer;
use SprykerFeature\Zed\Glossary\Dependency\Plugin\GlossaryInstallerPluginInterface;
use Symfony\Component\Yaml\Yaml;

class YamlInstallerPlugin extends AbstractPlugin implements GlossaryInstallerPluginInterface
{
    /**
     * @var GlossaryDependencyContainer
     */
    protected $dependencyContainer;

    public function installGlossaryData()
    {
        $filePath = __DIR__ . '/../../File/initial_translation.yml';
        $translations = $this->parseYamlFile($filePath);
        $this->installKeysAndTranslations($translations);
    }

    /**
     * @param $filePath
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
        $glossaryFacade = $this->dependencyContainer->getGlossaryFacade();
        foreach ($translations['keys'] as $keyName => $data) {
            if (!$glossaryFacade->hasKey($keyName)) {
                $glossaryFacade->createKey($keyName);
            }

            foreach ($data['translations'] as $localeName => $text) {
                if (!$glossaryFacade->hasTranslation($keyName, $localeName)) {
                    $glossaryFacade->createAndTouchTranslation($keyName, $localeName, $text, true);
                }
            }
        }
    }
}
