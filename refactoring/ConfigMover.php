<?php

namespace ReneFactor;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class ConfigMover extends AbstractRefactorer
{

    public function refactor()
    {
        $finder = $this->getSettingsFinder();
        foreach ($finder as $file) {
            $bundle = str_replace('Settings.php', '', $file->getFilename());
            $path = str_replace('Business/' . $file->getFilename(), '', $file->getPathname());
            $newName = $bundle . 'Config.php';

            $content = $file->getContents();
            $search = 'class ' . $bundle . 'Settings';
            $replace = 'use SprykerEngine\Zed\Kernel\AbstractBundleConfig' . PHP_EOL
                . 'class ' . $bundle . 'Config extends AbstractBundleConfig'
            ;

            $content = str_replace($search, $replace, $content);

            echo '<pre>' . PHP_EOL . \Symfony\Component\VarDumper\VarDumper::dump($path . $newName) . PHP_EOL . 'Line: ' . __LINE__ . PHP_EOL . 'File: ' . __FILE__ . die();
            file_put_contents($path . $newName, $content);

        }

    }

    /**
     * @return Finder|SplFileInfo[]
     */
    private function getSettingsFinder()
    {
        $finder = new Finder();
        $finder->files()
//            ->in(__DIR__ . '/../src/Pyz/Zed/*/Business')
            ->in(__DIR__ . '/../vendor/spryker/*/src/*/Zed/*/Business')
            ->name('*Settings.php')
        ;

        return $finder;
    }
}
