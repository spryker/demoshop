<?php

namespace ReneFactor;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class FactoryAccessReplacer extends AbstractRefactorer
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
        if (preg_match('/->factory/', $content)) {
            $this->info($this->file->getPathname());
            $content = str_replace('->factory', '->getFactory()', $content);
            $content = str_replace('->getFactory() =', '->factory =', $content);
//            file_put_contents($this->file->getPathname(), $content);
        }
    }

}
