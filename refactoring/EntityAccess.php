<?php

namespace ReneFactor;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class EntityAccess extends AbstractRefactorer
{

    const REGEX = '/(?:\$this(?:\s*?)->locator|\$locator|\$this->getLocator\(\)|Locator::getInstance\(\))(?:\s*?)->(.*?)\(\)(?:\s*?)->entity(.*?)\(\)/';

    public function refactor()
    {
        $finder = $this->getFinder();

        foreach ($finder as $file) {
            $content = $file->getContents();

            if (preg_match_all(self::REGEX, $content, $matches, PREG_SET_ORDER)) {
                foreach ($matches as $match) {
                    $bundle = ucfirst($match[1]);
                    $type = ucfirst($match[2]);

                    $replaceWith = 'new \\SprykerFeature\\Zed\\' . $bundle . '\\Persistence\\Propel\\' . $type . '()';
                    $content = str_replace($match[0], $replaceWith, $content);
                    file_put_contents($file->getPathname(), $content);

                    $this->info($file->getFilename());
                }
            }
        }
    }

    /**
     * @return Finder|SplFileInfo[]
     */
    private function getFinder()
    {
        $finder = new Finder();
        $finder->files()
            ->in(__DIR__ . '/../src/Pyz/')
            ->in(__DIR__ . '/../tests/')
            ->in(__DIR__ . '/../vendor/spryker/spryker/Bundles/*/src/')
            ->in(__DIR__ . '/../vendor/spryker/spryker/Bundles/*/tests/')
            ->name('*.php')
        ;

        return $finder;
    }

}
