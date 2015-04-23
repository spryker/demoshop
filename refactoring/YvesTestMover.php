<?php

namespace ReneFactor;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class YvesTestMover extends AbstractRefactorer
{

    public function refactor()
    {
        $fileSystem = new Filesystem();
        $finder = $this->getYvesTestInUnitTestFinder();

        foreach ($finder as $file) {
            $destination = str_replace('/Unit/', '/YvesUnit/', $file->getPathname());

            $dir = dirname($destination);
            if (!is_dir($dir)) {
                chmod($dir, 777);
                mkdir($dir, 777, true);
            }

            $content = str_replace('Unit\\', 'YvesUnit\\', $file->getContents());
            file_put_contents($destination, $content);

            unlink($file->getPathname());
        }
    }

    /**
     * @return Finder|SplFileInfo[]
     */
    private function getYvesTestInUnitTestFinder()
    {
        $finder = new Finder();
        $finder
            ->files()
            ->in(__DIR__ . '/../vendor/spryker/*/tests/Unit/*/Yves')
            ->exclude([
                'pillar',
                'saltstack',
                'yves-package',
                'zed-package'
            ])
        ;

        return $finder;
    }

}
