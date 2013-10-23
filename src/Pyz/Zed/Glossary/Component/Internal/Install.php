<?php
namespace Pyz\Zed\Glossary\Component\Internal;

use \ProjectA\Zed\Library\Dependency\DependencyFactoryInterface;
use ProjectA\Zed\Library\Dependency\DependencyFactoryTrait;
use Symfony\Component\Yaml\Yaml;
use ProjectA\Zed\Glossary\Component\Internal\Install as CoreInstall;

/**
 * @property \Generated_Zed_Glossary_Component_Factory $factory
 */
class Install extends CoreInstall implements
    DependencyFactoryInterface
{
    use DependencyFactoryTrait;

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
