<?php
namespace Pyz\Zed\Glossary2\Business;

use ProjectA\Zed\Glossary2\Dependency\Plugin\GlossaryInstallerPluginInterface;
use Pyz\Zed\Glossary2\Communication\Plugin\YamlDemoDataInstaller;

class Glossary2Settings
{
    protected $locator;

    public function __construct($locator)
    {
        $this->locator = $locator;
    }

    /**
     * @return GlossaryInstallerPluginInterface[]
     */
    public function getGlossaryInstallers()
    {
        return [
            $this->locator->glossary2()->pluginYamlInstallerPlugin()
        ];
    }
}
