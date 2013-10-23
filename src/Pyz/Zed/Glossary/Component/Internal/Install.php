<?php
namespace Pyz\Zed\Glossary\Component\Internal;

use Symfony\Component\Yaml\Yaml;
use ProjectA\Zed\Glossary\Component\Internal\Install as CoreInstall;

/**
 * @property \Generated_Zed_Glossary_Component_Factory $factory
 */
class Install extends CoreInstall implements
    \ProjectA_Zed_Library_Dependency_Factory_Interface
{
    use \ProjectA_Zed_Library_Dependency_Factory_Trait;

    /**
     * @return array
     */
    protected function getConfig()
    {
        $yamlParser = new Yaml();
        return $yamlParser->parse(file_get_contents($this->factory->createSettings()->getDumpFilePathName()));
    }

    /**
     * @return boolean
     */
    public function isActive()
    {
        return true;
    }
}
