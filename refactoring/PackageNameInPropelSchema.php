<?php

namespace ReneFactor;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\Process\Process;

class PackageNameInPropelSchema extends AbstractRefactorer
{

    public function refactor()
    {
        $fileSystem = new Filesystem();
        $finder = $this->getBundleFinder();

        foreach ($finder as $dir) {
            $bundle = $dir->getFilename();
            $cwd = $dir->getPathname();

            try {
                $finder = new Finder();

                /* @var SplFileInfo $file */
                foreach ($finder->files()->in($cwd . '/src/*/Zed/*/Persistence/Propel/Schema')->name('*.xml') as $file) {
                    $content = str_replace('zed-package', $bundle, $file->getContents());
                    file_put_contents($file->getPathname(), $content);
                }
            } catch (\Exception $e) {}

        }
    }

    /**
     * @return Finder|SplFileInfo[]
     */
    private function getBundleFinder()
    {
        $finder = new Finder();
        $finder
            ->directories()
            ->in(__DIR__ . '/../vendor/spryker/')
            ->exclude([
                'pillar',
                'saltstack',
                'yves-package',
                'zed-package'
            ])
            ->depth('< 1')
        ;

        return $finder;
    }

}
