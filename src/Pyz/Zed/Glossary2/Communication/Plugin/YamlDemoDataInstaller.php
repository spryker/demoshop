<?php

namespace Pyz\Zed\Glossary2\Communication\Plugin;

use ProjectA\Zed\Glossary2\Business\Glossary2Facade;
use ProjectA\Zed\Glossary2\Business\Glossary2Factory;
use ProjectA\Zed\Glossary2\Dependency\Plugin\GlossaryInstallerPluginInterface;
use ProjectA\Zed\Kernel\Business\FacadeLocator;
use ProjectA\Zed\Kernel\Locator;
use Symfony\Component\Yaml\Yaml;

class YamlDemoDataInstaller implements GlossaryInstallerPluginInterface
{
    /**
     * @var Glossary2Facade
     */
    protected $glossaryFacade;

    public function __construct()
    {
        $this->glossaryFacade = new Glossary2Facade(new Glossary2Factory(), new Locator());
    }

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
        foreach ($translations['keys'] as $keyName => $data) {
            if (!$this->glossaryFacade->hasKey($keyName)) {
                $this->glossaryFacade->createKey($keyName);
            }

            foreach ($data['translations'] as $localeName => $text) {
                if (!$this->glossaryFacade->hasTranslation($keyName, $localeName)) {
                    $this->glossaryFacade->createTranslation($keyName, $localeName, $text, true);
                }
            }
        }
    }
}
