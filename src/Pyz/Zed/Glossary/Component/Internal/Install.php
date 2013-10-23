<?php
namespace Pyz\Zed\Glossary\Component\Internal;

use ProjectA\Zed\Library\Dependency\Factory\FactoryInterface;
use ProjectA\Zed\Library\Dependency\FactoryTrait;
use Symfony\Component\Yaml\Yaml;
use ProjectA\Zed\Glossary\Component\Internal\Install as CoreInstall;

/**
 * @property \Generated_Zed_Glossary_Component_Factory $factory
 */
class Install extends CoreInstall implements
    FactoryInterface
{
    use FactoryTrait;

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
