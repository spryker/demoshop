<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */
namespace Spryker\Refactor\Parser;

use Spryker\Refactor\ClassInfo\ClassInfo;
use Spryker\Refactor\ClassInfo\UseStatement;
use Symfony\Component\Finder\SplFileInfo;

class UseStatementParser
{

    /**
     * @param SplFileInfo $file
     * @param ClassInfo $classInfo
     *
     * @return void
     */
    public function parse(SplFileInfo $file, ClassInfo $classInfo)
    {
        $fileContent = $file->getContents();

        $useStatements = [];

        preg_match_all('/use\s(.*?);/', $fileContent, $useStatements);

        $this->addUseStatementToClassInfo($useStatements, $classInfo);
    }

    /**
     * @param array $useStatements
     * @param ClassInfo $classInfo
     *
     * @return void
     */
    private function addUseStatementToClassInfo(array $useStatements, ClassInfo $classInfo)
    {
        foreach ($useStatements[1] as $position => $useStatement) {
            $useStatementInfo = new UseStatement();
            $useStatementInfo->setFullUseStatement($useStatements[0][$position]);

            $fullyQualifiedClassName = $useStatement;
            if (preg_match('/\sas\s/', $useStatement)) {
                list($fullyQualifiedClassName, $alias) = explode(' as ', $useStatement);
                $useStatementInfo->setUseAlias(trim($alias));
            }
            $classNameParts = explode('\\', $fullyQualifiedClassName);
            $useStatementInfo->setClassName(array_pop($classNameParts));
            $useStatementInfo->setClassNamespace(implode('\\', $classNameParts));

            $classInfo->addUseStatement($useStatement);

            echo '<pre>' . PHP_EOL . \Symfony\Component\VarDumper\VarDumper::dump($classInfo) . PHP_EOL . 'Line: ' . __LINE__ . PHP_EOL . 'File: ' . __FILE__ . die();
        }
    }
}
