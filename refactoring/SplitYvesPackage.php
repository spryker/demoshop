<?php

namespace ReneFactor;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use Zend\Filter\Word\CamelCaseToDash;

class SplitYvesPackage extends AbstractRefactorer
{

    /**
     * @var array
     */
    private $bundles = [];

    /**
     * @var array|SplFileInfo[]
     */
    private $globalFiles = [];

    public function refactor()
    {
        $fileSystem = new Filesystem();
        $finder = $this->getYvesPackageFinder();

        foreach ($finder as $file) {
            if ($file->getFilename() === 'codeception.yml' || $file->getFilename() === 'composer.json') {
                continue;
            }

            $bundle = $this->getBundleFromFile($file);

            if (!$bundle) {
                $this->globalFiles[] = $file;
                continue;
            }
            $namespace = $this->getNamespaceFromFile($file);

            if (!in_array($bundle, $this->bundles)) {
                $this->bundles[$bundle] = [];
            }
            $this->bundles[$bundle][] = $namespace;

            $destination = $this->getDestinationPath($bundle, $file);

            $fileSystem->copy($file->getPathname(), $destination);
            $fileSystem->remove($file->getPathname());
        }

        $this->createBundleDefaultFiles();
    }

    /**
     * @return Finder|SplFileInfo[]
     */
    private function getYvesPackageFinder()
    {
        $finder = new Finder();
        $finder
            ->files()
            ->in(__DIR__ . '/../vendor/spryker/yves-package')
        ;

        return $finder;
    }

    /**
     * @param SplFileInfo $file
     *
     * @return string
     */
    private function getBundleFromFile(SplFileInfo $file)
    {
        $path = str_replace(__DIR__ . '/../vendor/spryker/yves-package/', '', $file->getPathname());
        $pathParts = explode('/', $path);

        if (count($pathParts) <= 3) {
            return false;
        }
        if ($this->isTestFile($file)) {
            return $pathParts[4];
        }

        return $pathParts[3];
    }

    /**
     * @param SplFileInfo $file
     *
     * @return string
     */
    private function getNamespaceFromFile(SplFileInfo $file)
    {
        $path = str_replace(__DIR__ . '/../vendor/spryker/yves-package/', '', $file->getPathname());
        $pathParts = explode('/', $path);

        if ($this->isTestFile($file)) {
            return $pathParts[2];
        }
        return $pathParts[1];
    }

    private function createBundleDefaultFiles()
    {
        $fileSystem = new Filesystem();
        foreach ($this->bundles as $bundle => $namespaces) {
            $this->createCodeCeption($bundle);
            $this->createComposerJson($bundle, $namespaces);

            foreach ($this->globalFiles as $file) {
                $destination = $this->getDestinationPath($bundle, $file);
                $fileSystem->copy($file->getPathname(), $destination);
            }
        }

        foreach ($this->globalFiles as $file) {
            $fileSystem->remove($file->getPathname());
        }
    }

    /**
     * @param $bundle
     */
    private function createCodeCeption($bundle)
    {
        $tpl = file_get_contents(__DIR__ . '/Templates/codeception.yml');
        $content = str_replace('{{bundle}}', $bundle, $tpl);

        $path = $this->getPathToBundle($bundle);

        file_put_contents($path . '/codeception.yml', $content);
    }

    /**
     * @param $bundle
     *
     * @return string
     */
    private function getPathToBundle($bundle)
    {
        $filteredBundle = $this->getFilteredBundle($bundle);

        return __DIR__ . '/../vendor/spryker/' . $filteredBundle;
    }

    /**
     * @param $bundle
     * @param $namespaces
     */
    private function createComposerJson($bundle, $namespaces)
    {
        $tpl = file_get_contents(__DIR__ . '/Templates/composer.json');
        $content = str_replace('{{bundle}}', $bundle, $tpl);
        $namespaceStrings = [];
        foreach ($namespaces as $namespace) {
            $namespaceStrings[] = '"' . $namespace . '": "src/"';
            $namespaceStrings[] = '"' . $namespace . '": "tests/"';
        }
        $content = str_replace('{{namespaces}}', implode(",\n", $namespaceStrings), $content);

        $path = $this->getPathToBundle($bundle);

        file_put_contents($path . '/composer.json', $content);
    }

    /**
     * @param SplFileInfo $file
     *
     * @return bool|int
     */
    private function isTestFile(SplFileInfo $file)
    {
        $pathParts = explode('/', $file->getPathname());
        if ($pathParts[10] === 'tests') {
            return true;
        }

        return false;
    }

    /**
     * @param $bundle
     * @return array|string
     */
    private function getFilteredBundle($bundle)
    {
        $filter = new CamelCaseToDash();
        $filteredBundle = $filter->filter($bundle);

        return strtolower($filteredBundle);
    }

    /**
     * @param $bundle
     * @param SplFileInfo $file
     *
     * @return string
     */
    private function getDestinationPath($bundle, SplFileInfo $file)
    {
        $path = str_replace('yves-package', $this->getFilteredBundle($bundle), $file->getPathname());

        return $path;
    }

}
