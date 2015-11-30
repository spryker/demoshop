<?php

namespace Spryker\Refactor\DependencyContainer;

use SprykerFeature\Zed\Development\Business\Refactor\AbstractRefactor;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Reflection\ClassReflection;

class RemoveFactoryUse extends AbstractRefactor
{

    const KEY_SPL_FILE_INFO = 'spl file info';
    const KEY_IS_PROJECT = 'is project';
    const KEY_SEARCH_AND_REPLACE = 'search and replace';
    const KEY_USES = 'uses';
    const KEY_METHODS = 'methods';
    const KEY_SEPARATOR = '-';

    /**
     * @var array
     */
    protected $dependencyContainerCollection = [];

    /**
     * @return string
     */
    protected function getClassHeader()
    {
        return '<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

';
    }

    /**
     * @return void
     */
    public function refactor()
    {
        $dependencyContainerCollection = $this->getDependencyContainerCollection();

        foreach ($dependencyContainerCollection as $dependencyContainer) {
            $dependencyContainerKey = $this->getKeyFor($dependencyContainer);
            $this->dependencyContainerCollection[$dependencyContainerKey] = [
                self::KEY_SPL_FILE_INFO => $dependencyContainer,
                self::KEY_IS_PROJECT => $this->isProject($dependencyContainer),
                self::KEY_USES => [],
                self::KEY_METHODS => [],
                self::KEY_SEARCH_AND_REPLACE => [],
            ];
            $this->addMetaInfo($dependencyContainerKey);
        }

        $this->refactorDependencyContainer();
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
            __DIR__ . '/../../vendor/spryker/spryker/Bundles/*/src/*/Zed/*/*/',
        ];

        $dependencyContainer = $this->getFiles($directories, '*DependencyContainer.php');

        return $dependencyContainer;
    }

    /**
     * @param SplFileInfo $dependencyContainer
     *
     * @return string
     */
    protected function getKeyFor(SplFileInfo $dependencyContainer)
    {
        $keyParts = [
            $this->getNamespaceFromFileInfo($dependencyContainer),
            $this->getBundleFromFileInfo($dependencyContainer),
            $this->getLayerFromFileInfo($dependencyContainer),
        ];

        return implode(self::KEY_SEPARATOR, $keyParts);
    }

    /**
     * @param string $dependencyContainerKey
     *
     * @return void
     */
    protected function addMetaInfo($dependencyContainerKey)
    {
        $dependencyContainerMeta = $this->dependencyContainerCollection[$dependencyContainerKey];
        $dependencyContainer = $this->getDependencyContainerFromCollection($dependencyContainerKey);
        $dependencyContainerClassName = $this->getClassNameFromFileInfo($dependencyContainer);

        $reflectionClass = ClassGenerator::fromReflection(
            new ClassReflection($dependencyContainerClassName)
        );

        foreach ($reflectionClass->getMethods() as $method) {
            $methodBody = $method->getBody();
            if ($this->hasFactoryUsages($methodBody)) {
                $factoryUsages = $this->getFactoryUsages($methodBody);
                foreach ($factoryUsages[1] as $position => $createName) {
                    if ($dependencyContainerMeta[self::KEY_IS_PROJECT]) {
                        $fullyQualifiedClassName = $this->findClassByCreateNameAndDependencyContainer($createName, $dependencyContainer);
//                        $className = $this->getClassNameFromFullQualifiedClassName($fullyQualifiedClassName);
                    } else {
                        $fullyQualifiedClassName = $this->findCoreClassByCreateNameAndDependencyContainer($createName, $dependencyContainer);
//                        $className = $this->getClassNameFromFullQualifiedClassName($fullyQualifiedClassName);
                        try {
                            $projectDependencyContainerKey = $this->getProjectDependencyContainerKeyFromCoreKey($dependencyContainerKey);

                            if (array_key_exists($projectDependencyContainerKey, $this->dependencyContainerCollection)) {

                                $projectMethodBody = str_replace($factoryUsages[0][$position], 'new \\' . $fullyQualifiedClassName . '(', $methodBody);
                                $projectMethods = $this->dependencyContainerCollection[$projectDependencyContainerKey][self::KEY_METHODS];
                                $methodCopy = $method;
                                $methodCopy->setBody($projectMethodBody);
                                $projectMethods[$method->getName()] = $methodCopy;
                                $this->dependencyContainerCollection[$projectDependencyContainerKey][self::KEY_METHODS] = $projectMethods;

//                                $projectFullyQualifiedClassName = $this->findClassByCreateNameAndDependencyContainer($createName, $dependencyContainer, true);
//                                $projectUses = $this->dependencyContainerCollection[$projectDependencyContainerKey][self::KEY_USES];
//                                if (!in_array($projectFullyQualifiedClassName, $projectUses)) {
//                                    $projectUses[] = $projectFullyQualifiedClassName;
//                                    $this->dependencyContainerCollection[$projectDependencyContainerKey][self::KEY_USES] = $projectUses;
//                                }
                            }
                        } catch (NoFileFoundException $exception) {
                        }
                    }
                    $dependencyContainerMeta[self::KEY_SEARCH_AND_REPLACE][$factoryUsages[0][$position]] = 'new \\' . $fullyQualifiedClassName . '(';
                    $dependencyContainerMeta[self::KEY_USES][] = $fullyQualifiedClassName;
                }
            }
        }
        $this->dependencyContainerCollection[$dependencyContainerKey] = $dependencyContainerMeta;
    }

    /**
     * @param string $createName
     * @param SplFileInfo $dependencyContainer
     * @param bool $searchOnlyInProject
     *
     * @throws FoundTooManyFilesException
     * @throws NoFileFoundException
     * @throws RefactorException
     *
     * @return string|SplFileInfo
     */
    protected function findClassByCreateNameAndDependencyContainer($createName, SplFileInfo $dependencyContainer, $searchOnlyInProject = false)
    {
        $directory = $this->getPathToBundleLayer('/../../src/Pyz/Zed/%s/%s/', $dependencyContainer);

        try {
            $file = $this->getFileByCreateName($directory, $createName);
        } catch (NoFileFoundException $exception) {
            if ($searchOnlyInProject) {
                throw $exception;
            }

            return $this->findCoreClassByCreateNameAndDependencyContainer($createName, $dependencyContainer);
        }

        return $this->getClassNameFromFileInfo($file);
    }

    /**
     * @param string $createName
     * @param SplFileInfo $dependencyContainer
     *
     * @throws FoundTooManyFilesException
     * @throws NoFileFoundException
     * @throws RefactorException
     *
     * @return SplFileInfo
     */
    protected function findCoreClassByCreateNameAndDependencyContainer($createName, SplFileInfo $dependencyContainer)
    {
        $directory = $this->getPathToBundleLayer('/../../vendor/spryker/spryker/Bundles/*/src/*/Zed/%s/%s/', $dependencyContainer);
        $file = $this->getFileByCreateName($directory, $createName);

        return $this->getClassNameFromFileInfo($file);
    }

    /**
     * @param string $dependencyContainerKey
     *
     * @return SplFileInfo
     */
    protected function getDependencyContainerFromCollection($dependencyContainerKey)
    {
        $dependencyContainerMeta = $this->dependencyContainerCollection[$dependencyContainerKey];
        $dependencyContainer = $dependencyContainerMeta[self::KEY_SPL_FILE_INFO];

        return $dependencyContainer;
    }

    /**
     * @param $basePath
     * @param SplFileInfo $dependencyContainer
     *
     * @return string
     */
    protected function getPathToBundleLayer($basePath, SplFileInfo $dependencyContainer)
    {
        $directory = __DIR__ . sprintf($basePath,
            $this->getBundleFromFileInfo($dependencyContainer),
            $this->getLayerFromFileInfo($dependencyContainer)
        );

        return $directory;
    }

    /**
     * @param string $fullyQualifiedClassName
     *
     * @return string
     */
    protected function getClassNameFromFullQualifiedClassName($fullyQualifiedClassName)
    {
        $parts = explode('\\', $fullyQualifiedClassName);
        $className = array_pop($parts);

        return $className;
    }

    /**
     * @param $methodBody
     *
     * @return int
     */
    private function hasFactoryUsages($methodBody)
    {
        return preg_match('/getFactory\(\)->create/', $methodBody);
    }

    /**
     * @param $methodBody
     *
     * @return mixed
     */
    private function getFactoryUsages($methodBody)
    {
        preg_match_all('/\$this->getFactory\(\)->create(.*?)\(/', $methodBody, $matches);

        return $matches;
    }

    /**
     * @param SplFileInfo $dependencyContainer
     *
     * @return array
     */
    private function getUseStatements(SplFileInfo $dependencyContainer)
    {
        preg_match_all('/use (.*);/', $dependencyContainer->getContents(), $uses);

        return $uses[1];
    }

    /**
     * @param string $directory
     * @param string $createName
     *
     * @throws FoundTooManyFilesException
     * @throws NoFileFoundException
     * @throws RefactorException
     *
     * @return SplFileInfo
     */
    private function getFileByCreateName($directory, $createName)
    {
        $files = $this->getFiles([$directory]);
        $foundFiles = [];
        foreach ($files as $file) {
            $pathForCheck = str_replace(DIRECTORY_SEPARATOR, '', $file->getPathname());
            if (preg_match('/' . $createName . '.php/', $pathForCheck)) {
                $foundFiles[] = $file;
            }
        }

        if (count($foundFiles) > 1) {
            throw new FoundTooManyFilesException(sprintf('Found too many files with name matched by "%s" in "%s"', $createName, $directory));
        }

        if (count($foundFiles) === 0) {
            throw new NoFileFoundException(sprintf('Could not find any file matched by "%s" in "%s"', $createName, $directory));
        }

        return current($foundFiles);
    }

    /**
     * @param $dependencyContainerKey
     *
     * @return string
     */
    private function getProjectDependencyContainerKeyFromCoreKey($dependencyContainerKey)
    {
        $parts = explode(self::KEY_SEPARATOR, $dependencyContainerKey);
        array_shift($parts);
        array_unshift($parts, self::NAMESPACE_PROJECT);

        return implode(self::KEY_SEPARATOR, $parts);
    }

    private function refactorDependencyContainer()
    {
        foreach ($this->dependencyContainerCollection as $dependencyContainerKey => $dependencyContainer) {
            $this->replaceFactoryUsages($dependencyContainer, $dependencyContainerKey);
//            $this->addUseStatements($dependencyContainerKey);
            $this->addMethods($dependencyContainerKey);
        }
    }

    /**
     * @param array $dependencyContainer
     * @param string $dependencyContainerKey
     *
     * @return void
     */
    private function replaceFactoryUsages(array $dependencyContainer, $dependencyContainerKey)
    {
        $searchAndReplace = $dependencyContainer[self::KEY_SEARCH_AND_REPLACE];
        $dependencyContainer = $this->getDependencyContainerFromCollection($dependencyContainerKey);
        $content = str_replace(
            array_keys($searchAndReplace),
            array_values($searchAndReplace),
            $dependencyContainer->getContents()
        );

        $filesystem = new Filesystem();
        $filesystem->dumpFile($dependencyContainer->getPathname(), $content);
    }

    /**
     * @param string $dependencyContainerKey
     *
     * @return void
     */
    private function addUseStatements($dependencyContainerKey)
    {
        $dependencyContainerMeta = $this->dependencyContainerCollection[$dependencyContainerKey];

        $dependencyContainer = $this->getDependencyContainerFromCollection($dependencyContainerKey);
        $dependencyContainerClassName = $this->getClassNameFromFileInfo($dependencyContainer);
        $reflectionClass = ClassGenerator::fromReflection(
            new ClassReflection($dependencyContainerClassName)
        );

        $givenUses = $this->getUseStatements($dependencyContainer);
        $newUses = $dependencyContainerMeta[self::KEY_USES];
        if (count($newUses) > 0) {
            $uses = array_unique(array_merge($givenUses, $newUses));
            foreach ($uses as $use) {
                if (preg_match('/\sas\s/', $use)) {
                    list($use, $alias) = explode(' as ', $use);
                    $reflectionClass->addUse(trim($use), trim($alias));
                } else {
                    $reflectionClass->addUse(trim($use));
                }
            }

            $this->saveReflectionChanges($dependencyContainer, $reflectionClass);
        }
    }

    /**
     * @param string $dependencyContainerKey
     *
     * @return void
     */
    private function addMethods($dependencyContainerKey)
    {
        $dependencyContainerMeta = $this->dependencyContainerCollection[$dependencyContainerKey];

        $dependencyContainer = $this->getDependencyContainerFromCollection($dependencyContainerKey);
        $dependencyContainerClassName = $this->getClassNameFromFileInfo($dependencyContainer);
        echo $dependencyContainer->getFilename() . PHP_EOL;
        $reflectionClass = ClassGenerator::fromReflection(
            new ClassReflection($dependencyContainerClassName)
        );

        $givenMethods = $reflectionClass->getMethods();
        $newMethods = $dependencyContainerMeta[self::KEY_METHODS];
        if (count($newMethods) > 0) {
            foreach ($newMethods as $methodName => $method) {
                if (!array_key_exists(strtolower($methodName), $givenMethods)) {
                    $reflectionClass->addMethodFromGenerator($method);
                }
            }

            $this->saveReflectionChanges($dependencyContainer, $reflectionClass);
        }
    }

    /**
     * @param SplFileInfo $dependencyContainer
     * @param ClassGenerator $reflectionClass
     *
     * @return void
     */
    private function saveReflectionChanges(SplFileInfo $dependencyContainer, ClassGenerator $reflectionClass)
    {
        $filesystem = new Filesystem();
        $extendedClass = $reflectionClass->getExtendedClass();
        if ($extendedClass) {

            $extendedClassParts = explode('\\', $extendedClass);
            $extendedClass = array_pop($extendedClassParts);

            if (preg_match('/' . $extendedClass . ' as (.*?);/', $dependencyContainer->getContents(), $matches)) {
                $extendedClass = trim($matches[1]);
            }

            $reflectionClass->setExtendedClass($extendedClass);
        }
        $filesystem->dumpFile($dependencyContainer->getPathname(), $this->getClassHeader() . $reflectionClass->generate());
    }

}
