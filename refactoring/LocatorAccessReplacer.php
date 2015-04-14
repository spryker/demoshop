<?php

namespace ReneFactor;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class LocatorAccessReplacer extends AbstractRefactorer
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
        $content = $this->file->getContents();
        if (preg_match('/->locator/', $content)) {
            $this->info($this->file->getPathname());
            $content = str_replace('->locator', '->getLocator()', $content);
            $content = str_replace('->getLocator() =', '->locator =', $content);
            file_put_contents($this->file->getPathname(), $content);
        }
    }

}
