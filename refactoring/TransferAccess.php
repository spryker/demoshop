<?php

namespace ReneFactor;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class TransferAccess extends AbstractRefactorer
{

    public function refactor()
    {
        $finder = $this->getFinder();

        foreach ($finder as $file) {

        }

    }

    /**
     * @return Finder|SplFileInfo[]
     */
    private function getFinder()
    {
        $finder = new Finder();
        $finder->files()
            ->in(__DIR__ . '/../src/Pyz/Zed/')
            ->in(__DIR__ . '/../vendor/spryker/*/src/*/Zed/')
            ->exclude()
            ->name('*.php')
        ;

        return $finder;
    }
}
