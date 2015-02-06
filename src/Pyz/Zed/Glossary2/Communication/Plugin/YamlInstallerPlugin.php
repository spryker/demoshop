<?php

namespace Pyz\Zed\Glossary2\Communication\Plugin;

use ProjectA\Zed\Glossary2\Business\Glossary2Facade;
use ProjectA\Zed\Glossary2\Communication\Glossary2DependencyContainer;
use ProjectA\Zed\Glossary2\Dependency\Plugin\GlossaryInstallerPluginInterface;
use ProjectA\Zed\Kernel\Business\FacadeLocator;
use ProjectA\Zed\Kernel\Communication\AbstractPlugin;
use ProjectA\Zed\Kernel\Locator;
use Symfony\Component\Yaml\Yaml;

class YamlInstallerPlugin extends AbstractPlugin implements GlossaryInstallerPluginInterface
{
    /**
     * @var Glossary2DependencyContainer
     */
    protected $dependencyContainer;


    public function installGlossaryData()
    {
        $filePath = __DIR__ . '/../../File/initial_translation.yml';
        $translations = $this->parseYamlFile($filePath);
        $this->installKeysAndTranslations($translations);
    }

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
                    $glossaryFacade->createTranslation($keyName, $localeName, $text, true);
                }
            }
        }
    }
}
