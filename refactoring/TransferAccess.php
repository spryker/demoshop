<?php

namespace ReneFactor;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class TransferAccess extends AbstractRefactorer
{

    const REGEX_1 = '/\$this->(?:locator|getLocator\(\))->(.*?)\(\)->transfer(.*?)\(\)/';
    const REGEX_2 = '/Locator::getInstance\(\)->(.*?)\(\)->transfer(.*?)\(\)/';

    public function refactor()
    {
        $finder = $this->getFinder();

        foreach ($finder as $file) {
            $content = $file->getContents();
            if (preg_match(self::REGEX_1, $content, $matches)) {
                $bundle = ucfirst($matches[1]);
                $type = ucfirst($matches[2]);
                if (strstr($type, 'Collection') !== false) {
                    continue;
                } else {
                    $content = $this->rename($bundle, $type, $content, $file, self::REGEX_1);
                }
            }
            if (preg_match(self::REGEX_2, $content, $matches)) {
                $bundle = ucfirst($matches[1]);
                $type = ucfirst($matches[2]);
                if (strstr($type, 'Collection') !== false) {
                    continue;
                } else {
                    $content = $this->rename($bundle, $type, $content, $file, self::REGEX_2);
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
            ->in(__DIR__ . '/../vendor/spryker/*/src/*/')
            ->in(__DIR__ . '/../vendor/spryker/*/tests/*/')
            ->name('*.php')
        ;

        return $finder;
    }

    /**
     * @param $bundle
     * @param $type
     * @param $content
     * @param $file
     * @return mixed
     */
    private function rename($bundle, $type, $content, SplFileInfo $file, $regex)
    {
        $replaceWith = 'new \\Generated\\Shared\\Transfer\\' . $bundle . $type . 'Transfer()';
        $content = preg_replace($regex, $replaceWith, $content);
        file_put_contents($file->getPathname(), $content);

        return $content;
    }
}
