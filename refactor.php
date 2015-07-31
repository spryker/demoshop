<?php

include_once(__DIR__ . '/vendor/autoload.php');

$names = [
    'OrderItem',
    'CartItem',
    'WishlistItem'
];
// rename in xml

$directories = [
    __DIR__ . '/src/',
    __DIR__ . '/vendor/spryker/spryker/'
];

/**
 * @param array $directories
 *
 * @return \Symfony\Component\Finder\SplFileInfo[]
 */
function getXmlFiles(array $directories)
{
    $finder = new \Symfony\Component\Finder\Finder();
    $finder->files()->in($directories)->name('*.xml');

    return $finder;
}

$finder = getXmlFiles($directories);

foreach ($finder as $file) {
    foreach ($names as $name) {
        $search = [
            '<transfer name="' . $name . '">',
            '<property name="grossPrice" type="string" />',
            '<property name="quantity" type="string" />',
            'type="' . $name,
        ];
        $replace = [
            '<transfer name="Item">',
            '<property name="grossPrice" type="int" />',
            '<property name="quantity" type="int" />',
            'type="Item',
        ];

        $content = file_get_contents($file->getPathname());
        $content = str_replace($search, $replace, $content);

        file_put_contents($file->getPathname(), $content);
    }
}



// rename in php
/**
 * @param array $directories
 *
 * @return \Symfony\Component\Finder\SplFileInfo[]
 */
function getPhpFiles(array $directories)
{
    $finder = new \Symfony\Component\Finder\Finder();
    $finder->files()->in($directories)->name('*.php');

    return $finder;
}

$finder = getPhpFiles($directories);

$filesystem = new \Symfony\Component\Filesystem\Filesystem();
foreach ($finder as $file) {
    foreach ($names as $name) {
        $search = [
            $name . 'Transfer',
            $name . 'Interface',
        ];
        $replace = [
            'ItemTransfer',
            'ItemInterface',
        ];

        $content = file_get_contents($file->getPathname());
        $content = str_replace($search, $replace, $content);

        file_put_contents($file->getPathname(), $content);
    }
}
