<?php

namespace ReneFactor;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class DependencyContainerPropertyRemover extends AbstractRefactorer
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
        $methodDocBlock = '/**' . PHP_EOL . ' * @method {{dependencyContainerPrefix}}DependencyContainer getDependencyContainer()' . PHP_EOL . ' */' . PHP_EOL . '$0';

        $searchPattern = '/\/\*\*\n\s+\*\s+@var\s(.*?)DependencyContainer\n+\s+\*\/\n\s+protected\s\$dependencyContainer;\n\n/';

        $content = $this->file->getContents();

        if (preg_match($searchPattern, $content, $matches)) {
            $this->info($this->file->getPathname());

            $dependencyContainerPrefix = $matches[1];
            $methodDocBlock = str_replace('{{dependencyContainerPrefix}}', $dependencyContainerPrefix, $methodDocBlock);

            $content = preg_replace('/(final|abstract|class|interface)/', $methodDocBlock, $content);
            $content = preg_replace($searchPattern, '', $content);
            $content = str_replace('        /**', '    /**', $content);

            $this->info($this->file->getPathname());
            file_put_contents($this->file->getPathname(), $content);
        }
    }

}
