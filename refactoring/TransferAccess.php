<?php

namespace ReneFactor;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class TransferAccess extends AbstractRefactorer
{

    const REGEX = '/(?:\$this->locator|\$this->getLocator\(\)|Locator::getInstance\(\)|\$locator)->(.*?)\(\)->transfer(.*?)\(\)/';

    public function refactor()
    {
        $finder = $this->getFinder();

        foreach ($finder as $file) {
            $content = $file->getContents();

            $callback = function ($match) use ($content, $file) {
                $bundle = ucfirst($match[1]);
                $type = ucfirst($match[2]);

                if (strstr($type, 'Collection') !== false) {
                } else {
                    $replaceWith = 'new \\Generated\\Shared\\Transfer\\' . $bundle . $type . 'Transfer()';
                    $content = str_replace($match[0], $replaceWith, $content);
                    file_put_contents($file->getPathname(), $content);
                    $this->info($file->getFilename());
                }
            };
            preg_replace_callback(self::REGEX, $callback, $content);
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
            ->in(__DIR__ . '/../vendor/spryker/*/src/')
            ->in(__DIR__ . '/../vendor/spryker/*/tests/')
            ->name('*.php')
        ;

        return $finder;
    }

}
