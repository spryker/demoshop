<?php

namespace ReneFactor;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class DependencyContainerMethodRemover extends AbstractRefactorer
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

        $searchPattern = '/\/\*\*\n\s+\*\s+@return\s(.*?)DependencyContainer\n+\s+\*\/\n\s+protected\sfunction\sgetDependencyContainer\(\)\n\s+{\n\s+(?:.*);\n\s+\}\n+/';

        $content = $this->file->getContents();

        if (!preg_match('/private \$dependencyContainer;/', $content) && preg_match($searchPattern, $content, $matches)) {
            $this->info($this->file->getPathname());

            $dependencyContainerPrefix = $matches[1];
            $methodDocBlock = str_replace('{{dependencyContainerPrefix}}', $dependencyContainerPrefix, $methodDocBlock);

            $content = preg_replace('/(final|abstract|class|interface)/', $methodDocBlock, $content);

            $content = preg_replace($searchPattern, '', $content);
            $content = preg_replace('/[\s]{8}\/\*\*/', '    /**', $content);
            $content = preg_replace('/[\s]{8}(protected|private|public)/', '    $0', $content);

            $this->info($this->file->getPathname());
            file_put_contents($this->file->getPathname(), $content);
        }
    }

}
