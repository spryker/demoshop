<?php
namespace Pyz\Zed\Glossary\Component\Internal;

use Symfony\Component\Yaml\Parser;
use ProjectA\Zed\Glossary\Component\Internal\Install as CoreInstall;

class Install extends CoreInstall
{
    /**
     * @return array
     */
    protected function getConfig()
    {
        $yamlParser = new Parser();
        return $yamlParser->parse(file_get_contents(__DIR__ . '/initial_translation.yml'));
    }

    /**
     * @return boolean
     */
    public function isActive()
    {
        return true;
    }
}
