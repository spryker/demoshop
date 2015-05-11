<?php

namespace ReneFactor;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use Zend\Filter\Word\CamelCaseToUnderscore;

class RenameTransfer extends AbstractRefactorer
{

    public function refactor()
    {
        $finder = $this->getXmlFinder();

        $example = [
            'Transfer' => [
                'bundle' => 'Foo',
                'old' => 'FooFooTransfer',
                'new' => 'Transfer',
            ]
        ];

        $transfers = [];

        foreach ($finder as $file) {
            $pathParts = explode(DIRECTORY_SEPARATOR, $file->getPathname());
            $bundle = array_slice($pathParts, 11, 1);
            $bundle = $bundle[0];

            $content = $file->getContents();

            if (preg_match_all('/transfer name="(.*?)"/', $content, $matches, PREG_SET_ORDER)) {
                foreach ($matches as $match) {
                    $old = $match[1] . 'Transfer';
                    $new1 = preg_replace('/^' . $bundle . '/', '', $old);
                    $new = preg_replace('/^' . $bundle . '/', '', $new1);

                    if ('Transfer' === $new) {
                        $new = $new1;
                    }
                    
                    if ('Transfer' === $new) {
                        $new = $old;
                    }

                    if (array_key_exists($new, $transfers)) {
                        $transfer = $transfers[$new];
                        unset($transfers[$new]);

                        $newName = $transfer['bundle'] . $transfer['new'];
                        $transfer['new'] = $newName;

                        $transfers[$newName] = $transfer;

                        $new = $bundle . $new;
                    }

                    $transfers[$new] = [
                        'bundle' => $bundle,
                        'old' => $old,
                        'new' => $new
                    ];
                }
            }
        }

        $this->rename($transfers);
    }

    /**
     * @return Finder|SplFileInfo[]
     */
    private function getXmlFinder()
    {
        $finder = new Finder();
        $finder->files()
            ->in(__DIR__ . '/../vendor/spryker/spryker/Bundles/*/src/*/Shared/*/Transfer')
            ->name('*.xml')
        ;

        return $finder;
    }

    /**
     * @param $transfers
     */
    private function rename($transfers)
    {
        foreach ($this->getFinder() as $file) {
            $content = $file->getContents();
            foreach ($transfers as $transfer) {
                if ($transfer['old'] !== $transfer['new']) {
                    $content = str_replace($transfer['old'], $transfer['new'], $content);
                }
            }

            file_put_contents($file->getPathname(), $content);
        }

    }

    /**
     * @return Finder|SplFileInfo[]
     */
    private function getFinder()
    {
        $finder = new Finder();
        $finder->files()
            ->in(__DIR__ . '/../vendor/spryker/spryker/Bundles/')
            ->in(__DIR__ . '/../src/Pyz/')
        ;

        return $finder;
    }

}
