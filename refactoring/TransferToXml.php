<?php

namespace ReneFactor;

use ReneFactor\TransferToXml\InterfaceStatement;
use ReneFactor\TransferToXml\Property;
use ReneFactor\TransferToXml\Transfer;
use ReneFactor\TransferToXml\UseStatement;
use SprykerEngine\Yves\Kernel\Locator;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use Zend\Filter\Word\CamelCaseToDash;

class TransferToXml extends AbstractRefactorer
{

    public function refactor()
    {
        $finder = $this->getFinder();

        $bundles = [];

        foreach ($finder as $file) {
            $bundle = $this->getBundleNameFromFile($file);

            $className = $this->getClassNameFromFile($file);
            $name = $this->getNameFromFile($file);

            if (!file_exists($file->getPathname()) || !class_exists($className)) {
                continue;
            }

            $instance = new $className(Locator::getInstance());

            require_once ($file->getPathname());

            $reflection = new \ReflectionClass($className);

            $properties = $this->getProperties($reflection, $instance);
            $uses = $this->getUses($file);
            $interfaces = $this->getInterfaces($file, $uses);

            $transfer = new Transfer($name, $properties, $uses, $interfaces);

            if (!array_key_exists($bundle, $bundles)) {
                $bundles[$bundle] = [];
            }
            $bundles[$bundle][] = $transfer;
        }


        foreach ($bundles as $bundle => $transfers) {
            $content = file_get_contents(__DIR__ . '/Template/transferDefinition.xml');
            $transferString = '';
            /* @var $transfer Transfer */
            foreach ($transfers as $transfer) {
                $transferString .= $transfer->render();
            }

            $content = str_replace('{{transfer}}', $transferString, $content);

            $filter = new CamelCaseToDash();
            $filteredBundleName = strtolower($filter->filter($bundle));

            $fileName = __DIR__ . '/../vendor/spryker/' . $filteredBundleName . '/src/SprykerFeature/Shared/' . $bundle . '/Transfer/transferDefinition.xml';
            $dir = dirname($fileName);
            if (!is_dir($dir)) {
                mkdir($dir, 0777, true);
            }

            file_put_contents($fileName, $content);

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
            ->exclude(__DIR__ . '/../vendor/spryker/system/src/')
            ->name('*.php')
            ->notName('*Collection.php')
            ->notName('*Interface.php')
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

    /**
     * @param SplFileInfo $file
     * @return mixed
     */
    private function getBundleNameFromFile(SplFileInfo $file)
    {
        $className = str_replace([__DIR__ . '/../vendor/spryker/', '.php'], '', $file->getPathname());
        $classNameParts = explode(DIRECTORY_SEPARATOR, $className);
        $classNameParts = array_slice($classNameParts, 4, 1);

        return $classNameParts[0];
    }

    /**
     * @param SplFileInfo $file
     * @return mixed
     */
    private function getNameFromFile(SplFileInfo $file)
    {
        $className = str_replace([__DIR__ . '/../vendor/spryker/', '.php'], '', $file->getPathname());
        $classNameParts = explode(DIRECTORY_SEPARATOR, $className);

        $name = array_pop($classNameParts);
        $bundle = array_slice($classNameParts, 4, 1);

        $name = $bundle[0] . $name;

        return $name;
    }

    /**
     * @param $reflection
     * @param $instance
     */
    private function getProperties(\ReflectionClass $reflection, $instance)
    {
        $properties = $reflection->getProperties();

        $propertiesForXml = [];

        foreach ($properties as $property) {
            $name = $property->getName();
            if (substr($name, 0, 1) === '_' || 'enrichAbleProperties' === $name) {
                continue;
            }
            $property->setAccessible(true);
            $value = $property->getValue($instance);
            $type = null;

            if (is_array($value)) {
                $type = 'array';
                $default = '[]';
            } elseif (is_null($value)) {
                $type = 'string';
                $default = (is_null($value)) ? 'null' : $value;
            } elseif (is_int($value)) {
                $type = 'int';
                $default = $value;
            } elseif (is_bool($value)) {
                $type = 'bool';
                $default = ($value) ? 'true' : 'false';
            } else {
                $type = 'string';
                $default = (empty($value)) ? 'null' : $value;
            }

            if (is_array($default)) {
                $default = '[]';
            }

            if ((substr($name, 0, 2) === 'id' || substr($name, 0, 2) === 'fk')) {
                $type = 'int';
            }


            $propertiesForXml[] = new Property($name, $type, $default);

            if (is_null($type)) {
                echo '<pre>' . PHP_EOL . var_dump($value) . PHP_EOL . 'Line: ' . __LINE__ . PHP_EOL . 'File: ' . __FILE__ . die();
            }

        }

        return $propertiesForXml;
    }

    /**
     * @param SplFileInfo $file
     *
     * @return array
     */
    private function getUses(SplFileInfo $file)
    {
        $content = $file->getContents();

        $uses = [];

        if (preg_match_all('/use(.*?);/', $content, $matches, PREG_SET_ORDER)) {
            foreach ($matches as $match) {
                $use = trim($match[1]);
                $uses[] = new UseStatement($use);
            }
        }

        return $uses;
    }

    /**
     * @param SplFileInfo $file
     * @param array|UseStatement[] $uses
     *
     * @return array|UseStatement
     */
    private function getInterfaces(SplFileInfo $file, array $uses)
    {
        $content = $file->getContents();

        $usedInterfaces = [];

        if (preg_match_all('/implements([^{]*)/', $content, $matches, PREG_SET_ORDER)) {
            foreach ($matches as $match) {
                $interfaces = str_replace("\n", '', $match[1]);
                $interfaces = explode(',', $interfaces);

                foreach ($interfaces as $interface) {
                    $interfaceInstance = new InterfaceStatement($interface);
                    if (!$interfaceInstance->hasFqcn()) {
                        foreach ($uses as $use) {
                            if ($use->getShort() === $interfaceInstance->getShort()) {
                                $interfaceInstance->setName($use->getName());
                            }
                        }
                    }
                    $usedInterfaces[] = $interfaceInstance;
                }
            }
        }

        return $usedInterfaces;
    }

}
