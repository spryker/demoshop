<?php

namespace Pyz\Zed\Application\Module\Controller;

use ProjectA\Shared\Library\Currency\CurrencyManager;
use Generated\Shared\Library\TransferLoader;
use Symfony\Component\Finder\Finder;
use Zend\Code\Reflection\ClassReflection;

class Index extends \ProjectA_Zed_Library_Controller_Action
{

    public function indexAction()
    {
        $this->_helper->layout->setLayout('modular');
    }

    public function cleanupAction()
    {
        $finder = new Finder();
        $bundles = (new \Generated_Shared_BundlePackageMapper())->getBundleList();
        $classNames = [];
        foreach ($bundles as $bundle) {
            try {
                $factoryName = 'Generated\Zed\\' . $bundle . '\Component\Factory';
                if (!class_exists($factoryName)) {
                    $factoryName = str_replace('\\', '_', $factoryName);
                }
                if (class_exists($factoryName)) {
                    $classNames['factory'][] = $factoryName;
                }
            } catch (\Exception $e) {}
        }
        $classNames = [];
        $classNames['loader'][] = 'Generated\Shared\Library\TransferLoader';
        $classNames['loader'][] = 'Generated_Zed_EntityLoader';
        $classNames['factory'][] = 'Generated\Yves\Factory';
        $methodNames = [];
        $ignorableMethods = [
            'getDummyClassName',
            'getStoreClassName',
            'getInstance',
        ];
        foreach ($classNames as $type => $classes) {
            foreach ($classes as $class) {
                $reflectionClass = new ClassReflection(new $class);
                foreach ($reflectionClass->getMethods() as $method) {
                    $methodName = $method->getName();
                    if (!in_array($methodName, $ignorableMethods) && substr($methodName, 0, 3) === 'get') {
                        $methodName = $methodName . '(';
                        if ($type === 'factory') {
                            $methodNames[$methodName] = str_replace('get', 'create', $methodName);
                        } else {
                            $methodNames[$methodName] = str_replace('get', 'load', $methodName);
                        }
                    }
                }
            }
        }

        \Zend_Debug::dump($methodNames, __CLASS__ . ' LINE: ' . __LINE__ . '<br/><br/>');die();

        $finder = new Finder();
        $dirs = [
            APPLICATION_ROOT_DIR . '/src/Pyz',
            APPLICATION_VENDOR_DIR . '/project-a',
        ];

        /* @var $file SplFileInfo */
        foreach ($finder->files()->in($dirs)->name('*.php') as $file) {
            $content = file_get_contents($file->getPathname());
            $content = str_replace(array_keys($methodNames), array_values($methodNames), $content);
            file_put_contents($file->getPathname(), $content);
        }
        die('TinaTurner');
    }
}

