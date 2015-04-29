<?php

namespace ReneFactor;

use SprykerEngine\Yves\Kernel\Locator;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class TransferInterfaceToDependencyFolder extends AbstractRefactorer
{

    public function refactor()
    {
        $finder = $this->getFinder();

        foreach ($finder as $file) {
            $className = $this->getClassNameFromFile($file);

            $instance = new $className(Locator::getInstance());

            $this->info($className);

            require_once ($file->getPathname());

            $reflection = new \ReflectionClass($className);

            $properties = $reflection->getProperties();
            foreach ($properties as $property) {
                $property->setAccessible(true);
                $value = $property->getValue($instance);
                $type = null;

                switch ($value) {
                    case is_null($value):
                        $type = 'integer';
                        break;
                    case is_string($value):
                        $type = 'string';
                        break;
                }

                if (is_null($type)) {
                    echo '<pre>' . PHP_EOL . var_dump($value) . PHP_EOL . 'Line: ' . __LINE__ . PHP_EOL . 'File: ' . __FILE__ . die();
                }
            }


        }
    }

    /**
     * @return Finder|SplFileInfo[]
     */
    private function getFinder()
    {
        $finder = new Finder();
        $finder->files()
            ->in(__DIR__ . '/../vendor/spryker/*/src/*/Shared/*/Transfer/')
            ->name('*.php')
            ->notName('*Collection.php')
        ;

        return $finder;
    }

    /**
     * @param SplFileInfo $file
     * @return mixed
     */
    private function getClassNameFromFile(SplFileInfo $file)
    {
        $className = str_replace([__DIR__ . '/../vendor/spryker/', '.php'], '', $file->getPathname());
        $classNameParts = explode(DIRECTORY_SEPARATOR, $className);
        $classNameParts = array_slice($classNameParts, 2);
        $className = implode('\\', $classNameParts);

        return $className;
    }

}
