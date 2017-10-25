<?php

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

    if ($classNameParts[0] === 'PhpStan') {
        array_shift($classNameParts);
        $className = implode(DIRECTORY_SEPARATOR, $classNameParts);
        $filePathPartsSupport = [
            __DIR__,
            'tests',
            'PhpStan',
            $className . '.php',
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
