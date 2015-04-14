<?php

namespace ReneFactor;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class LocatorPropertyRemover extends AbstractRefactorer
{

    /**
     * @var SplFileInfo
     */
    private $file;

    /**
     * @param SplFileInfo $file
     */
    public function setFile(SplFileInfo $file)
    {
        $this->file = $file;
    }

    public function refactor()
    {
        $searchPattern = '/\/\*\*\n\s+\*\s+@var\s(.*?)\n+\s+\*\/\n\s+protected\s\$locator;\n\n/';

        $content = $this->file->getContents();

        if (preg_match($searchPattern, $content, $matches)) {
            $this->info($this->file->getPathname());

            $dependencyContainerPrefix = $matches[1];

            $content = preg_replace($searchPattern, '', $content);

            $this->info($this->file->getPathname());
            file_put_contents($this->file->getPathname(), $content);
        }
    }

}
