<?php

require_once(__DIR__ . '/vendor/autoload.php');

$directories = [
    'Module/View' => 'Presentation',
    'Module' => 'Communication',
    'Component' => 'Business'
];
$vendorDirPattern = __DIR__ . '/vendor/spryker/*/src/ProjectA/*/*/';
$projectDirPattern = __DIR__ . '/src/Pyz/*/*/';

$baseDirs = [
    $vendorDirPattern,
    $projectDirPattern
];

$newWorldOrder = [];
$newWorldOrder['php'] = [];
$newWorldOrder['others'] = [];

foreach ($baseDirs as $baseDir) {
    foreach ($directories as $old => $new) {
        $finder = new \Symfony\Component\Finder\Finder();
        /* @var $file \Symfony\Component\Finder\SplFileInfo */
        foreach ($finder->files()->in($baseDir . $old) as $file) {
            $newPath = str_replace($file->getRelativePathname(), '', $file->getPathname());
            $newPath = str_replace($old, $new, $newPath);

            if ($file->getExtension() === 'php') {
                $parts = explode('/', trim(str_replace('.php', '', $file->getPathname()), '/'));

                if (strpos($file->getPathname(), '/Pyz/') !== false) {
                    $relevantParts = array_splice($parts, 5);
                } else {
                    $relevantParts = array_splice($parts, 8);
                }

                $relevantNamespaceParts = $relevantParts;
                array_pop($relevantNamespaceParts);

                $relevantPartsNew = $relevantParts;
                $relevantPartsNew[3] = $new;
                $relevantNamespacePartsNew = $relevantPartsNew;
                array_pop($relevantNamespacePartsNew);

                $fileInfo = [
                    'path' => $file->getPathname(),
                    'pathNew' => $newPath . $file->getRelativePathname(),
                    'psr0className' => implode('_', $relevantParts),
                    'psr0classNameNew' => implode('_', $relevantPartsNew),
                    'psr1className' => implode('\\', $relevantParts),
                    'psr1classNameNew' => implode('\\', $relevantPartsNew),
                    'namespace' => implode('\\', $relevantNamespaceParts),
                    'namespaceNew' => implode('\\', $relevantNamespacePartsNew)
                ];
                $newWorldOrder['php'][] = $fileInfo;
            } else {
                if ($new === 'Communication' && $file->getExtension() === 'twig') {
                    continue;
                }
                $fileInfo = [
                    'path' => $file->getPathname(),
                    'pathNew' => $newPath . $file->getRelativePathname(),
                    'psr0className' => null,
                    'psr0classNameNew' => null,
                    'psr1className' => null,
                    'psr1classNameNew' => null,
                    'namespace' => null,
                    'namespaceNew' => null
                ];
                $newWorldOrder['others'][] = $fileInfo;
            }

        }

    }
}

//file_put_contents(__DIR__ . '/newWorldOrder.txt', print_r($newWorldOrder, true));
//die();


$filesystem = new \Symfony\Component\Filesystem\Filesystem();
// Move all files from old dir to new dir
foreach ($newWorldOrder as $type => $files) {
    foreach ($files as $file) {
        $filesystem->copy($file['path'], $file['pathNew']);
    }
}
//die('Moved all files');

$searchDirectories = [
    __DIR__ . '/config',
    __DIR__ . '/src',
    __DIR__ . '/vendor/spryker',
];

$finder = new \Symfony\Component\Finder\Finder();

//foreach ($newWorldOrder['php'] as $file) {
foreach ($finder->files()->in($searchDirectories)->name('*.php') as $file) {
    $content = file_get_contents($file->getPathname());

    foreach ($newWorldOrder['php'] as $fileInfo) {
        $content = str_replace(
            [
                $fileInfo['psr1className'],
                $fileInfo['namespace'],
                $fileInfo['psr0className'],
            ],
            [
                $fileInfo['psr1classNameNew'],
                $fileInfo['namespaceNew'],
                $fileInfo['psr0classNameNew'],
            ],
            $content
        );
    }
    file_put_contents($file->getPathname(), $content);
}
//die('Replaced all file contents');


foreach ($newWorldOrder as $type => $files) {
    foreach ($files as $file) {
        try {
            $filesystem->remove($file['path']);
        } catch (\Exception $e) {
            echo $file['path'] . ' could not delete file' . PHP_EOL;
        }
    }
}
//die('Deleted all files');
