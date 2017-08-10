<?php

use Zend\Filter\FilterChain;
use Zend\Filter\StringToLower;
use Zend\Filter\Word\CamelCaseToDash;

$autoloader = function ($className) {

    $className = ltrim($className, '\\');
    $classNameParts = explode('\\', $className);

    if ($classNameParts[0] === 'PyzTest') {
        array_shift($classNameParts);
        $application = array_shift($classNameParts);
        $bundle = array_shift($classNameParts);
        $className = implode(DIRECTORY_SEPARATOR, $classNameParts);
        $filePathPartsSupport = [
            __DIR__,
            'tests',
            'PyzTest',
            $application,
            $bundle,
            '_support',
            $className . '.php',
        ];
    }

    if ($classNameParts[0] === 'SprykerTest') {
        $filter = new FilterChain();
        $filter->attach(new CamelCaseToDash());
        $filter->attach(new StringToLower());

        $bundle = $filter->filter($classNameParts[2]);

        $rest = array_slice($classNameParts, 3);
        $className = implode(DIRECTORY_SEPARATOR, $rest) . '.php';
        $filePathPartsSupport = [
            __DIR__,
            'vendor',
            'spryker',
            $bundle,
            'tests',
            'SprykerTest',
            $classNameParts[1],
            $classNameParts[2],
            '_support',
            $className,
        ];
    }

    if (isset($filePathPartsSupport)) {
        $filePath = implode(DIRECTORY_SEPARATOR, $filePathPartsSupport);
        if (file_exists($filePath)) {
            require $filePath;

            return true;
        }
    }

    return false;
};

spl_autoload_register($autoloader);
