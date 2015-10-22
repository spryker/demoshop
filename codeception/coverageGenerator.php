<?php

include __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\Yaml\Yaml;

class Codeception
{

    /**
     * @var array
     */
    private $configurationTemplate = [
        'namespace' => '',
        'actor' => 'Tester',
        'paths' => [
            'tests' => 'tests',
            'log' => 'tests/_output',
            'data' => 'tests/_data',
            'support' => 'tests/_support',
            'envs' => 'tests/_envs',
        ],
        'settings' => [
            'bootstrap' => '_bootstrap.php',
            'suite_class' => '\PHPUnit_Framework_TestSuite',
            'colors' => true,
            'memory_limit' => '1024M',
            'log' => true,
        ],
        'coverage' => [
            'enabled' => true,
        ],
    ];

    /**
     * @return void
     */
    public function createConfigWithBusinessCoverage()
    {
        $filesystem = new Filesystem();
        $finder = new Finder();

        $directory = __DIR__ . '/../vendor/spryker/spryker/Bundles/*/';
        $finder->in($directory)->name('codeception.yml');

        /** @var SplFileInfo $file */
        foreach ($finder as $file) {
            $pathParts = explode('/', $file->getPathname());
            array_pop($pathParts);
            $bundle = array_pop($pathParts);

            $bundleConfig = $this->configurationTemplate;
            $bundleConfig['namespace'] = $bundle;

            if ($this->hasBundleLayer($bundle, 'Business')) {
                $bundleConfig['coverage']['whitelist'] = [
                    'include' => [
                        'src/*/Zed/' . $bundle . '/Business/*',
                    ],
                ];
            }

            $bundleConfig['coverage']['blacklist'] = [
                'include' => [
                    'tests/*',
                    '../../../../../vendor/*',
                ],
            ];

            if ($this->hasBundleLayer($bundle, 'Persistence')) {
                $bundleConfig['coverage']['blacklist']['include'][] = 'src/*/Zed/' . $bundle . '/Persistence/Propel/Map/*';
                $bundleConfig['coverage']['blacklist']['include'][] = 'src/*/Zed/' . $bundle . '/Persistence/Propel/Base/*';
            }

            $configYml = Yaml::dump($bundleConfig);

            $filesystem->dumpFile($file->getPathname(), $configYml);
        }
    }

    /**
     * @return void
     */
    public function createConfigCleanCoverage()
    {
        $filesystem = new Filesystem();
        $finder = new Finder();

        $directory = __DIR__ . '/../vendor/spryker/spryker/Bundles/*/';
        $finder->in($directory)->name('codeception.yml');

        /** @var SplFileInfo $file */
        foreach ($finder as $file) {
            $pathParts = explode('/', $file->getPathname());
            array_pop($pathParts);
            $bundle = array_pop($pathParts);

            $bundleConfig = $this->configurationTemplate;
            $bundleConfig['namespace'] = $bundle;

            $bundleConfig['coverage']['whitelist'] = [
                'include' => [
                    'src/*',
                ],
            ];

            if ($this->hasBundleLayer($bundle, 'Persistence')) {
                if (count(glob('src/*/Zed/' . $bundle . '/Persistence/Propel/Map/*')) > 0) {
                    $bundleConfig['coverage']['whitelist']['exclude'][] = 'src/*/Zed/' . $bundle . '/Persistence/Propel/Map/*';
                }
                if (count(glob('src/*/Zed/' . $bundle . '/Persistence/Propel/Base/*')) > 0) {
                    $bundleConfig['coverage']['whitelist']['exclude'][] = 'src/*/Zed/' . $bundle . '/Persistence/Propel/Base/*';
                }
            }

            $bundleConfig['coverage']['blacklist'] = [
                'exclude' => [
                    'tests/*',
                    '../../../../../vendor/*',
                ],
            ];

            $configYml = Yaml::dump($bundleConfig);

            $filesystem->dumpFile($file->getPathname(), $configYml);
        }
    }

    /**
     * @param string $bundle
     * @param string $layer
     *
     * @return bool
     */
    private function hasBundleLayer($bundle, $layer)
    {
        $directory = __DIR__ . '/../vendor/spryker/spryker/Bundles/' . $bundle . '/src/*/Zed/' . $bundle . '/' . $layer;
        $glob = glob($directory);

        return (count($glob) > 0);
    }

    /**
     * @return void
     */
    public function removeConfigBackup()
    {
        $filesystem = new Filesystem();

        $finder = new Finder();

        $directory = __DIR__ . '/../vendor/spryker/spryker/Bundles/*/';
        $files = $finder->in($directory)->name('codeception.yml.tmp');

        $filesystem->remove($files);
    }

}

$codeception = new Codeception();
$codeception->createConfigCleanCoverage();
$codeception->removeConfigBackup();
