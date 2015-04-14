<?php

namespace ReneFactor;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class DependencyContainerAccessReplacer extends AbstractRefactorer
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
        if (preg_match('/->dependencyContainer/', $content)) {
            $this->logger->info($this->file->getPathname());
            $content = str_replace('->dependencyContainer', '->getDependencyContainer()', $content);
            $content = str_replace('->getDependencyContainer() ', '->dependencyContainer ', $content);
//            file_put_contents($this->file->getPathname(), $content);
        }
    }

}
