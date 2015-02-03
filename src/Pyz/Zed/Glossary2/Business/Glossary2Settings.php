<?php
namespace Pyz\Zed\Glossary2\Business;

use ProjectA\Zed\Glossary2\Dependency\Plugin\GlossaryInstallerPluginInterface;
use Pyz\Zed\Glossary2\Communication\Plugin\YamlDemoDataInstaller;

class Glossary2Settings
{
    /**
     * @return GlossaryInstallerPluginInterface[]
     */
    public function getGlossaryInstallers()
    {
        return [
            new YamlDemoDataInstaller()
        ];
    }
}
