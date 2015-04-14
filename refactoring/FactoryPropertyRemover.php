<?php

namespace ReneFactor;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class FactoryPropertyRemover extends AbstractRefactorer
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
        $methodDocBlock = '/**' . PHP_EOL . ' * @method {{bundle}}{{layer}} getFactory()' . PHP_EOL . ' */' . PHP_EOL . '$0';

        $searchPattern = '/\/\*\*\n\s+\*\s+@var\s(.*?)(Business|Communication|Persistence)\n+\s+\*\/\n\s+protected\s\$factory;\n/';

        $content = $this->file->getContents();

        if (preg_match($searchPattern, $content, $matches)) {
            $this->info($this->file->getPathname());

            $bundle = $matches[1];
            $layer = $matches[2];

            $methodDocBlock = str_replace('{{bundle}}', $bundle, $methodDocBlock);
            $methodDocBlock = str_replace('{{layer}}', $layer, $methodDocBlock);

            $content = preg_replace('/(final|abstract|class|interface)/', $methodDocBlock, $content);
            $content = preg_replace($searchPattern, '', $content);

            $this->info($this->file->getPathname());
            file_put_contents($this->file->getPathname(), $content);
        }
    }

}
