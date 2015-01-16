<?php

require_once(__DIR__ . '/vendor/autoload.php');

$move = function ($filePathPattern, $application = 'Zed') {
    // Move classes
    $finder = new \Symfony\Component\Finder\Finder();
    $filesystem = new \Symfony\Component\Filesystem\Filesystem();
    /* @var $file \Symfony\Component\Finder\SplFileInfo */
    foreach ($finder->files()->in($filePathPattern) as $file) {
        $from = $file->getPathname();
        $to = preg_replace('/vendor\/spryker\/(.*?)-package\//', 'vendor/spryker/' . $application . '-package/', $from);
        $filesystem->copy($from, $to);
    }
};


// replace package name in schemas
$schemaReplacement = function () {
    $filePathPattern = 'vendor/spryker/zed-package/src/ProjectA/Zed';
    // Move classes
    $finder = new \Symfony\Component\Finder\Finder();
    $filesystem = new \Symfony\Component\Filesystem\Filesystem();
    /* @var $file \Symfony\Component\Finder\SplFileInfo */
    foreach ($finder->files()->in($filePathPattern)->name('*.schema.xml') as $file) {
        $content = $file->getContents();
        $content = preg_replace('/vendor\/spryker\/(.*?)-package\//', 'vendor/spryker/zed-package/', $content);
        file_put_contents($file->getPathname(), $content);
    }
};

// copy bin files to zed-package
$binMovement = function () {
    $filePathPattern = 'vendor/spryker/*/bin';
    // Move classes
    $finder = new \Symfony\Component\Finder\Finder();
    $filesystem = new \Symfony\Component\Filesystem\Filesystem();
    /* @var $file \Symfony\Component\Finder\SplFileInfo */
    foreach ($finder->files()->in($filePathPattern) as $file) {
        if ($file->getFilename() === 'jenkins.war' || $file->getFilename() === 'solr.war') {
            continue;
        }
        $from = $file->getPathname();
        $to = preg_replace('/vendor\/spryker\/(.*?)-package\//', 'vendor/spryker/zed-package/', $from);
        $filesystem->copy($from, $to);
    }
};

$copyFiles = function () {
    $filesystem = new \Symfony\Component\Filesystem\Filesystem();
    $filesystem->copy(
        __DIR__ . '/vendor/spryker/infrastructure-package/Gruntfile.js',
        __DIR__ . '/vendor/spryker/zed-package/Gruntfile.js'
    );
    $filesystem->copy(
        __DIR__ . '/vendor/spryker/infrastructure-package/package.json',
        __DIR__ . '/vendor/spryker/zed-package/package.json'
    );
};

$copyFiles();
$schemaReplacement();

$binMovement('vendor/spryker/*/bin');

$move('vendor/spryker/*/src/ProjectA/Zed');
$move('vendor/spryker/*/tests/PhpUnit/ProjectA/Zed');

$move('vendor/spryker/*/src/ProjectA/Shared');
$move('vendor/spryker/*/tests/PhpUnit/ProjectA/Shared');

$move('vendor/spryker/*/src/ProjectA/Yves', 'yves');
$move('vendor/spryker/*/tests/PhpUnit/ProjectA/Yves', 'yves');

