<?php

namespace ReneFactor;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class TransferAccess extends AbstractRefactorer
{

    const REGEX = '/\$this->(?:locator|getLocator\(\))->(.*?)\(\)->transfer(.*?)\(\)/';

    public function refactor()
    {
        $finder = $this->getFinder();

        foreach ($finder as $file) {
            $content = $file->getContents();
            if (preg_match(self::REGEX, $content, $matches)) {
                $bundle = ucfirst($matches[1]);
                $type = ucfirst($matches[2]);
                if (strstr($type, 'Collection') !== false) {
                    continue;
                } else {
                    $replaceWith = 'new \\Generated\\Shared\\Transfer\\' . $bundle . $type . 'Transfer()';
                    $content = preg_replace(self::REGEX, $replaceWith, $content);
                    file_put_contents($file->getPathname(), $content);
//                    echo '<pre>' . PHP_EOL . var_dump($file) . PHP_EOL . 'Line: ' . __LINE__ . PHP_EOL . 'File: ' . __FILE__ . die();
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
}
