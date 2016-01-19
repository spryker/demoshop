<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Spryker\Dependency\DependencyFinder;

use Symfony\Component\Finder\SplFileInfo;

class UseStatement extends AbstractDependencyChecker
{

    /**
     * @param SplFileInfo $fileInfo
     * @param string $bundle
     *
     * @throws \Exception
     * @return void
     */
    public function checkDependencies(SplFileInfo $fileInfo, $bundle)
    {
        $content = $fileInfo->getContents();

        if (preg_match_all('/use Spryker\\\(.*?)\\\(.*?)\\\/', $content, $matches, PREG_SET_ORDER)) {
            foreach ($matches as $match) {
                $toBundle = $match[2];
                if ($toBundle !== $bundle) {
                    $this->addDependency($match[2]);
                }
            }
        }
    }

}
