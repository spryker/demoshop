<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Spryker\Refactor;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

abstract class AbstractRefactor implements RefactorInterface
{

    /**
     * @param array $directories
     * @param string $name
     * @param string|int $depth
     *
     * @throws RefactorException
     *
     * @return Finder|SplFileInfo[]
     */
    final protected function getFiles(array $directories, $name = null, $depth = null)
    {
        foreach ($directories as $key => $directory) {
            if (!glob($directory)) {
                unset($directories[$key]);
            }
        }

        if (count($directories) === 0) {
            throw new RefactorException('Directories can not be resolved with glob. Maybe you have a wrong path pattern applied.');
        }

        $finder = new Finder();
        $finder->files()->in($directories);

        if ($name !== null) {
            $finder->name($name);
        }

        if ($depth !== null) {
            $finder->depth($depth);
        }

        return $finder;
    }

}
