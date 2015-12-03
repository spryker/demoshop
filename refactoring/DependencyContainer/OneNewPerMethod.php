<?php

namespace Spryker\Refactor\DependencyContainer;

use SprykerFeature\Zed\Development\Business\Refactor\AbstractRefactor;
use SprykerFeature\Zed\Development\Business\Refactor\RefactorException;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Reflection\ClassReflection;

class OneNewPerMethod extends AbstractRefactor
{

    /**
     * @return void
     */
    public function refactor()
    {
        $dependencyContainerCollection = $this->getDependencyContainerCollection();
        foreach ($dependencyContainerCollection as $dependencyContainer) {
            $this->checkNewKeyWordsUsages($dependencyContainer);
        }
    }

    /**
     * @throws RefactorException
     *
     * @return Finder|SplFileInfo[]
     */
    private function getDependencyContainerCollection()
    {
        $directories = [
            __DIR__ . '/../../src/Pyz/Zed/*/*/',
            __DIR__ . '/../../src/Pyz/Yves/*/*/',
            __DIR__ . '/../../src/Pyz/Client/*/*/',
            __DIR__ . '/../../vendor/spryker/spryker/Bundles/*/src/*/Zed/*/*/',
            __DIR__ . '/../../vendor/spryker/spryker/Bundles/*/src/*/Yves/*/*/',
            __DIR__ . '/../../vendor/spryker/spryker/Bundles/*/src/*/Client/*/*/',
        ];

        $dependencyContainer = $this->getFiles($directories, '*DependencyContainer.php');

        return $dependencyContainer;
    }

    /**
     * @param SplFileInfo $dependencyContainer
     *
     * @return void
     */
    protected function checkNewKeyWordsUsages(SplFileInfo $dependencyContainer)
    {
        $dependencyContainerClassName = $this->getClassNameFromFileInfo($dependencyContainer);
        $reflectionClass = ClassGenerator::fromReflection(
            new ClassReflection($dependencyContainerClassName)
        );

        foreach ($reflectionClass->getMethods() as $method) {
            $methodBody = $method->getBody();
            $newKeywordUsage = [];
            if (preg_match_all('/new\s/', $methodBody, $newKeywordUsage) && count($newKeywordUsage[0]) > 1) {
                echo $dependencyContainerClassName . '::' . $method->getName() . PHP_EOL;
            }
        }
    }

}
