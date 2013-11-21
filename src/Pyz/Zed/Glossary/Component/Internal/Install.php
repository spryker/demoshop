<?php
namespace Pyz\Zed\Glossary\Component\Internal;

use Symfony\Component\Yaml\Yaml;
use ProjectA\Zed\Glossary\Component\Internal\Install as CoreInstall;

/**
 * @property \Generated\Zed\Glossary\Component\GlossaryFactory $factory
 */
class Install extends CoreInstall
{

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
