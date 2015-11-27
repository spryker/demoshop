<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Spryker\Refactor\Transfer;

use Spryker\Refactor\AbstractRefactor;
use Spryker\Refactor\Refactor;
use Spryker\Refactor\RefactorException;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\SplFileInfo;

class RemoveTransferInterfaces extends AbstractRefactor
{

    /**
     * @param Refactor $refactor
     *
     * @throws RefactorException
     *
     * @return bool
     */
    public function refactor(Refactor $refactor)
    {
        $directories = [
            __DIR__ . '/../../src/Pyz/',
            __DIR__ . '/../../vendor/spryker/spryker/Bundles/',
        ];
        $phpFiles = $this->getFiles($directories, '*.php');

        $filesystem = new Filesystem();

        foreach ($phpFiles as $phpFile) {

            $content = $phpFile->getContents();

            // Search for transfer interface usages
            $interfacesUsagePattern = '/use Generated\\\\Shared\\\\.*\\\\(.+)Interface;/';
            if (preg_match_all($interfacesUsagePattern, $content, $interfaceMatches, PREG_SET_ORDER) === 0) {
                continue;
            }

            foreach ($interfaceMatches as $match) {
                $this->replaceInterfaceUsages($match[1], $content, $phpFile);

                $this->replaceInterfaceTypeHints($match[1], $content, $phpFile);
            }

            $filesystem->dumpFile($phpFile->getPathname(), $content);
        }
    }

    /**
     * @param string $transferName
     * @param string $content
     * @param SplFileInfo $phpFile
     *
     * @throws \Exception
     * @return mixed
     */
    protected function replaceInterfaceUsages($transferName, $content, SplFileInfo $phpFile)
    {
        $interfaceUsagePattern = '/use Generated\\\\Shared\\\\.*\\\\' . $transferName . 'Interface;\n/';
        $transferUsagePattern = '/use Generated\\\\Shared\\\\Transfer\\\\' . $transferName . 'Transfer;\n/';
        if (preg_match($transferUsagePattern, $content)) {
            $content = preg_replace($interfaceUsagePattern, '', $content);
        } else {
            $content = preg_replace($interfaceUsagePattern, 'use Generated\\Shared\\Transfer\\' . $transferName . "Transfer;\n", $content);
        }

        if ($content === null) {
            throw new \Exception(sprintf(
                'Could not replace %s usage in file %s',
                $transferName,
                $phpFile->getRealPath()
            ));
        }
    }

    /**
     * @param string $transferName
     * @param string $content
     * @param SplFileInfo $phpFile
     *
     * @throws \Exception
     * @return mixed
     */
    protected function replaceInterfaceTypeHints($transferName, &$content, SplFileInfo $phpFile)
    {
        $content = preg_replace('/\b' . $transferName . 'Interface\b/', $transferName . 'Transfer', $content);

        if ($content === null) {
            throw new \Exception(sprintf(
                'Could not replace %sInterface to %sTransfer in file %s',
                $transferName,
                $transferName,
                $phpFile->getRealPath()
            ));
        }
    }
}
