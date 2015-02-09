<?php
namespace Pyz\Zed\Glossary\Business;

use ProjectA\Zed\Glossary\Dependency\Plugin\GlossaryInstallerPluginInterface;

class GlossarySettings
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
            $this->locator->glossary()->pluginYamlInstallerPlugin()
        ];
    }
}
