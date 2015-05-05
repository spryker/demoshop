<?php

namespace ReneFactor;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class RemoveTransferObjects extends AbstractRefactorer
{

    public function refactor()
    {
        $finder = $this->getFinder();
        foreach ($finder as $file) {
            $this->info($file->getPathname());
            unlink($file->getPathname());
        }
    }

    /**
     * @return Finder|SplFileInfo[]
     */
    private function getFinder()
    {
        $finder = new Finder();
        $finder->files()
            ->in(__DIR__ . '/../vendor/spryker/spryker/Bundles/*/src/SprykerFeature/Shared/*/Transfer')
            ->name('*.php')
        ;

        return $finder;
    }

}
