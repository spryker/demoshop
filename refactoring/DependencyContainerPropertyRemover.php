<?php

namespace ReneFactor;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class DependencyContainerPropertyRemover extends AbstractRefactorer
{

    public function refactor()
    {
        $this->info('Start');

        $finder = new Finder();
        $path = [
            __DIR__ . '/../src/',
            __DIR__ . '/../tests/',
            __DIR__ . '/../vendor/spryker/',
        ];

        $methodDocBlock = '/**' . PHP_EOL . ' * @method {{dependencyContainerPrefix}}DependencyContainer getDependencyContainer()' . PHP_EOL . ' */' . PHP_EOL . '$0';

        $searchPattern = '/\/\*\*\n\s+\*\s+@var\s(.*?)DependencyContainer\n+\s+\*\/\n\s+protected\s\$dependencyContainer;/';

        /* @var $file SplFileInfo */
        foreach ($finder->files()->in($path) as $file) {
            $content = $file->getContents();

            if (preg_match($searchPattern, $content, $matches)) {
                $this->info($file->getPathname());

                $dependencyContainerPrefix = $matches[1];
                $docBlock = str_replace('{{dependencyContainerPrefix}}', $dependencyContainerPrefix, $methodDocBlock);

                $content = preg_replace('/(final|abstract|class|interface)/', $docBlock, $content);
                $content = preg_replace($searchPattern, '', $content);
                $content = preg_replace('/\n\n/', PHP_EOL, $content);

                file_put_contents($file->getPathname(), $content);
            }
        }
    }

}
