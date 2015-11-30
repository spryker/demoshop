<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Unit\Spryker\Refactor\ClassParser;

use Spryker\Refactor\ClassInfo\ClassInfo;
use Spryker\Refactor\Parser\UseStatementParser;
use Symfony\Component\Finder\SplFileInfo;

/**
 * @group Spryker
 * @group Refactor
 * @group UseStatement
 */
class UseStatementTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @return string
     */
    public function getFixtureDirectory()
    {
        return __DIR__ . '/Fixtures/';
    }

    public function testParseMustAddSimpleUseStatement()
    {
        $splFileInfo = $this->getFileInfo('UseStatement.php');
        $classInfo = new ClassInfo();

        $parser = new UseStatementParser();
        $parser->parse($splFileInfo, $classInfo);

        echo '<pre>' . PHP_EOL . \Symfony\Component\VarDumper\VarDumper::dump($splFileInfo) . PHP_EOL . 'Line: ' . __LINE__ . PHP_EOL . 'File: ' . __FILE__ . die();
    }

    /**
     * @param string $fileName
     *
     * @return SplFileInfo
     */
    private function getFileInfo($fileName)
    {
        $relativePath = dirname($this->getFixtureDirectory());
        $relativePathName = dirname($this->getFixtureDirectory()) . DIRECTORY_SEPARATOR . $fileName;
        $fileInfo = new SplFileInfo($this->getFixtureDirectory() . DIRECTORY_SEPARATOR . $fileName, $relativePath, $relativePathName);

        return $fileInfo;
    }
}
